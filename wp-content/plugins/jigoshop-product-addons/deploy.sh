#!/bin/bash
# A modification of Dean Clatworthy's deploy script as found here:
# https://github.com/deanc/wordpress-plugin-git-svn
# The difference is that this script works with the plugin's git repo & doesn't require an existing SVN repo.

if [ -z "$1" ]
then
	echo 'No repository to deploy to.'
	exit -1
fi

# main config
PLUGINSLUG="jigoshop-product-addons"
MAINFILE="product-addons.php" # this should be the name of your main php file in the wordpress plugin
TMPDIR="/tmp/$PLUGINSLUG"

# svn config
SVNURL="http://plugins.svn.wordpress.org/$1" # Remote SVN repo on wordpress.org, with no trailing slash
SVNUSER="megawebmaster" # your svn username
SVNPASS='o$w9Km^6t^Oh' # your svn password

# Directory setup, you shouldn't need to edit this
GITPATH=`pwd` # this file should be in the base of your git repository
SVNPATH="$TMPDIR/svn" # path to a temp SVN repo. No trailing slash required and don't add trunk.

# Let's begin...
echo
echo ".........................................."
echo
echo "  Preparing to deploy $PLUGINSLUG"
echo
echo ".........................................."
echo

echo

REVLIST=`git rev-list --tags --max-count=1`
NEWVERSION=`git tag --contains $REVLIST`

echo $NEWVERSION;
git checkout -f $NEWVERSION

# Check version in readme.txt is the same as plugin file after translating both to unix line breaks
# works around grep's failure to identify mac line breaks
NEWVERSION1=`grep "^Stable tag:" $GITPATH/readme.txt | awk -F' ' '{print $NF}'`
echo "readme.txt version: $NEWVERSION1"
NEWVERSION2=`grep "^ \* Version:" $GITPATH/$MAINFILE | awk -F' ' '{print $NF}'`
echo "$MAINFILE version: $NEWVERSION2"

if [ "$NEWVERSION1" != "$NEWVERSION2" ]; then echo "Version in readme.txt & $MAINFILE don't match. Exiting...."; exit 1; fi

echo "Versions match in readme.txt and $MAINFILE. Let's proceed..."

echo
echo "Creating local copy of SVN repo ..."
svn co "$SVNURL/trunk" $SVNPATH

echo
echo "Exporting from git to the trunk of SVN"
cp -R $GITPATH/* $SVNPATH

echo
echo "Changing directory to SVN and committing to trunk"
cd $SVNPATH
svn status | grep -v "^.[ \t]*\..*" | grep "^?" | awk '{print $2}' | xargs svn add

echo
echo ".........................................."
echo
echo "  Deploying Version: $NEWVERSION"
echo
echo ".........................................."
echo

echo "Committing a new version"
svn commit --username=$SVNUSER --password=$SVNPASS -m "Deploys version $NEWVERSION"

echo "Creating new SVN tag & committing it"
svn copy "$SVNURL/trunk" "$SVNURL/tags/$NEWVERSION" -m "Tags version $NEWVERSION"

echo "Cleaning up"
rm -fr "$TMPDIR/"

echo
echo ".........................................."
echo
echo "  Successfully deployed $PLUGINSLUG to WordPress"
echo
echo "  Current Version: $NEWVERSION1"
echo
echo ".........................................."
echo

cd $GITPATH
git checkout master

echo 'Successfully released ' . $NEWVERSION
