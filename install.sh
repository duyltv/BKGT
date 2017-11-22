#!/bin/bash
# GLOBAL VARIABLES
INS_PATH=/var/www/html

function clean_dir {
	rm -rf $INS_PATH/BKGT > /dev/null
}

function copy_dir {
	mkdir $INS_PATH/BKGT
	cp -rf * $INS_PATH/BKGT
	chown -R root:www-data $INS_PATH/BKGT
}

function check_dir {
	if [ -f $INS_PATH/BKGT/install.sh ]; then
		return 1;
	fi
	return 0;
}

# MAIN
echo Deploying BKGT into $INS_PATH...
echo -n [-] Cleaning old BKGT directory
clean_dir
echo -e '\t\t\t'[OK]
echo -n [-] Copying BKGT to $INS_PATH
copy_dir
echo -e '\t\t'[OK]
echo -n [-] Checking deploy is successfully
if [ check_dir ]; then
	echo -e '\t\t'[OK]
else
	echo -e '\t\t'[FAIL]
fi
echo
echo '---------------'
echo DONE