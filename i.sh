#!/bin/bash
# AUTOINSTALLATION OF SSHPANEL

# Clearing terminal first
clear

# Make sure this script is excecuted by root
if [[ $EUID -ne 0 ]]; then
   echo "INIT 0!, SCRIPT SHOULD BE RUN AS ROOT!" 1>&2
   exit 1
fi

# Display some credit messages
echo "#------------------------------------------------------------------------------#"
echo "#                                                                              #"
echo -e "#    \033[0;31m##### ##### ##  ## ###### ###### ###   ## ##### ##   \e[0m    {\e[1;36mV1.3 Rev 1\e[0m}     #"
echo -e "#    \033[0;31m##    ##    ##  ## ##  ## ##  ## ####  ## ##    ##   \e[0m                     #"
echo -e "#    \033[0;31m##### ##### ###### ###### ##  ## ## ## ## ##### ##   \e[0m                     #"
echo -e "#    \033[0;31m   ##    ## ##  ## ##     ###### ##  #### ##    ##   \e[0m                     #"
echo -e "#    \033[0;31m##### ##### ##  ## ##     ##  ## ##   ### ##### #####\e[0m                     #"
echo -e "#                             [\e[1;36mAn Easy Panel to Manage Your SSH User's\e[0m]        #"
echo "#                                                                              #"
echo "#------------------------------------------------------------------------------#"
echo -e "                        \e[1;36mCopyright (c) 2016 Rizal Fakhri\e[0m                        "
echo ""

# Detect OS
echo "DETECTING YOUR OS"
echo -ne '---------                                                                 (10%)\r'
sleep 1
echo -ne '--------------------                                                      (25%)\r'
sleep 1
echo -ne '--------------------------------------                                    (50%)\r'
sleep 1
echo -ne '------------------------------------------------------------              (90%)\r'
sleep 1
echo -ne '------------------------------------------------------------------------- (100%)\r'
echo -ne '\n'
case $(head -n1 /etc/issue | cut -f 1 -d ' ') in
    Debian)     OS="DEBIAN" ;;
    Ubuntu)     OS="UBUNTU" ;;
    CentOS)     OS="CENTOS" ;;
esac
echo ''
echo -e "DETECTED OS IS : \e[1;36m$OS\e[0m"

# Downloading installation script
curl -o install-sshpanel-$OS-v1.3 -L https://script.sshpanel.com/install/install-$OS-v1.3 && bash install-sshpanel-$OS-v1.3

