#! /bin/bash

sudo apt install -y patchelf


pip install archr ipdb

cd /p/Witcher/base/witcher
pip install -e .
cd ../phuzzer
pip install -e .


phpini_fpath=$(php -i |egrep "Loaded Configuration File.*php.ini"|cut -d ">" -f2|cut -d " " -f2)
sudo su -c "printf '\nzend_extension=/usr/local/lib/php/extensions/no-debug-non-zts-20180731/xdebug.so\nauto_prepend_file=/enable_cc.php\n\n' >> $phpini_fpath"


if [ -d /httpreqr ]; then
    mv /httpreqr /httpreqr_dir
fi

sudo cp /p/Witcher/base/httpreqr/httpreqr.64 /httpreqr
sudo cp /p/Widash/archbuilds/dash /bin/dash

echo "RUN >>> python -m witcher $(pwd) WICHR ; "





