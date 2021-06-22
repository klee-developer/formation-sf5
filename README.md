# Formation Symfony 5 Klee - Stack docksal

# Configuration de VM locale

## 1.	Pré-requis :
### a.	Activation du WSL2
**Fini virtual box et l'hyper V, vous pouvez désormais activer le tout à fait viable WSL2 sur votre windows**

En résumé, vérifiez que Windows est à jour, ouvrez le terminal de commande (CMD) en admin windows puis :
* i.	Tapez : 
  
  ``dism.exe /online /enable-feature /featurename:Microsoft-Windows-Subsystem-Linux /all /norestart``
* ii.	Ensuite :
  
  ``dism.exe /online /enable-feature /featurename:VirtualMachinePlatform /all /norestart``
* iii.	Téléchargez et installez à la main : 
  https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi
  
* iv.	Et enfin : 
  
  ``wsl --set-default-version 2``

*(ce qui correspond aux step 1 à 5 de https://docs.microsoft.com/en-us/windows/wsl/install-win10)*

### b.	Installez l'app Ubuntu depuis le store
Fermez le terminal de windows définitivement, et installez maintenant l’app Ubuntu depuis le Windows Store ( https://www.microsoft.com/en-us/p/ubuntu-1804-lts/9n9tngvndl3q?activetab=pivot:overviewtab ), cliquez sur « non merci » dans la popup lors du dl, il se lancera quand même

## 2.	Docker for windows :
### a.	Installation
Téléchargez et installez le : https://www.docker.com/products/docker-desktop (si vous ne l’avez pas déjà)

### b. Exposer le daemon
Dans Settings > Général cochez : Expose daemon on localhost2375 without TLS et cliquez sur Apply & restart

### c. Sélectionnez le storage
Ensuite spécifiez la distribution à laquelle vous souhaitez intégrer docker for windows (cochez ubuntu) :
 
## 3.	Paramétrer la VM
* Histoire d’être sereins, redémarrez le pc puis lancez docker windows
* Lancez ensuite le shell Ubuntu depuis votre pc, vous devriez être connecté en tant que root@NOMDEVOTREPC dans le /home fournit par le docker for windows
* Installez Docksal : 

  ``DOCKER_NATIVE=1 bash <(curl -fsSL https://get.docksal.io)``

* Et lancez les confs suivantes : 
```
fin config set --global DOCKSAL_VHOST_PROXY_IP="0.0.0.0"
fin system reset
sudo firewall-cmd --permanent --zone=public --add-service=dns
sudo firewall-cmd --reload
```

* Les fichiers de votre VM sont disponibles depuis votre explorateur windows au chemin : \\wsl$\Ubuntu-18.04\home
Partie projet Symfony sous Docksal
    - Récupérez mon projet et collez le dans votre **/home** : 
    - Allez dans le repo /home/formation, tapez ``fin init`` puis ``fin p start`` 
    - Accédez à l’url du projet 
 
    
**Pensez à versionner votre projet**

## 4. Utiliser le projet Docksal

Pour aller plus loin dans votre exploration de Docksal :
Quick tips :

**Utiliser composer** : ```fin composer COMMANDE_COMPOSER```

**Utiliser le CLI Symfony** : ```fin symfony COMMANDE_COMPOSER```

**Utiliser la DB** : ```fin db COMMANDE_DB```

**Utiliser NodejS** : ```fin run npm COMMANDE_NPM (globalement, run permet d’executer des commandes dans le CLI)```

**Entrer dans le container CLI** : ```fin bash```
