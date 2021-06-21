# formation-sf5

Partie configuration de VM locale
1.	Pré-requis :
a.	Activez WSL2 sur votre windows (step 1 à 5 de https://docs.microsoft.com/en-us/windows/wsl/install-win10)
En résumé, vérifiez que Windows est à jour, ouvrez le terminal de commande (CMD) en admin windows puis :
i.	Tapez : dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart
ii.	Tapez : dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart
iii.	Téléchargez et installez à la main : https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi
iv.	Tapez : wsl --set-default-version 2

b.	Fermez le terminal de windows définitivement, et installez maintenant l’app Ubuntu depuis le Windows Store ( https://www.microsoft.com/en-us/p/ubuntu-1804-lts/9n9tngvndl3q?activetab=pivot:overviewtab ), cliquez sur « non merci » dans la popup lors du dl, il se lancera quand même
2.	Docker for windows :
a.	Téléchargez et installez le : https://www.microsoft.com/en-us/p/ubuntu-1804-lts/9n9tngvndl3q?activetab=pivot:overviewtab (si vous ne l’avez pas déjà)
b.	Dans Settings > Général cochez : Expose daemon on localhost2375 without TLS et cliquez sur Apply & restart
 
c.	Ensuite spécifiez la distribution à laquelle vous souhaitez intégrer docker for windows (cochez ubuntu) :
 
3.	Paramétrer la VM
a.	Histoire d’être sereins, redémarrez le pc puis lancez docker windows
b.	Lancez ensuite le shell Ubuntu depuis votre pc, vous devriez être connecté en tant que root@NOMDEVOTREPC dans le /home fournit par le docker for windows
c.	Installez Docksal : 
DOCKER_NATIVE=1 bash <(curl -fsSL https://get.docksal.io)
d.	Lancez les confs suivantes : 
fin config set --global DOCKSAL_VHOST_PROXY_IP="0.0.0.0"
fin system reset
sudo firewall-cmd --permanent --zone=public --add-service=dns
sudo firewall-cmd --reload
e.	Les fichiers de votre VM sont disponibles depuis votre explorateur windows au chemin : \\wsl$\Ubuntu-18.04\home
Partie projet Symfony sous Docksal
1.	Récupérez mon projet et collez le dans votre /home : 
a.	Allez dans le repo /home/formation, tapez fin p start 
2.	Accédez à l’url du projet 
 
 

Pensez à versionner votre projet 

A priori pas besoin d’autre chose, tout est déjà ok pour la formation, vous avez un SF 5 et tout ce qui va bien (une base les extensions etc).

Pour aller plus loin dans votre exploration de Docksal et si vous avez la moindre question sur ce mail, n’hésitez pas à lire la doc, tout vient de là : https://docs.docksal.io/

Quick tips :
Faire du composer : fin composer COMMANDE_COMPOSER
Utiliser la db : fin db COMMANDE_DB
NodejS : fin run npm COMMANDE_NPM (globalement, run permet d’executer des commandes dans le CLI)
