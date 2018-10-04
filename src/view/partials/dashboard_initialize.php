  <?php
   require('src/view/partials/unset.php');
   $dataAdministrator=$administratorManager->getList();
   $dataEnquete=$enqueteManager->getList();
   $dataEchec=$enqueteManager->getEchec();
   $cout=$enqueteManager->getDepense()->fetch(PDO::FETCH_OBJ);
   $i=1;
   $e=1;
   while($enquete=$dataEnquete->fetch(PDO::FETCH_OBJ)){
        //Mise en fin des enquete a terme.
        require('src/view/partials/enquete_fin.php');
   }

   $dataEnquete=$enqueteManager->getList();
