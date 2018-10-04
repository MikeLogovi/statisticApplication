 <?php
                $maxPerformanceEvolution=$tabEvolution[1];$minPerformanceEvolution=$tabEvolution[1];$maxPerformanceTemps=$tabTemps[1];$minPerformanceTemps=$tabTemps[1];
                $maxPerformanceInd=1;$minPerformanceInd=1;
                 for($i=1;$i<=$nbEnquete;$i++){
                      if(($tabEvolution[$i]/$tabTemps[$i])<($minPerformanceEvolution/$minPerformanceTemps)){
                          $minPerformanceEvolution=$tabEvolution[$i];
                          $minPerformanceTemps=$tabTemps[$i];
                          $minPerformanceInd=$i;
                      }

                       if(($tabEvolution[$i]/$tabTemps[$i])>($maxPerformanceEvolution/$maxPerformanceTemps)){
                          $maxPerformanceEvolution=$tabEvolution[$i];
                          $maxPerformanceTemps=$tabTemps[$i];
                          $maxPerformanceInd=$i;
                      }
                 }

                $maxEnquete=$enqueteManager->read($tabIdEnquete[$maxPerformanceInd])->fetch(PDO::FETCH_OBJ);
                $minEnquete=$enqueteManager->read($tabIdEnquete[$minPerformanceInd])->fetch(PDO::FETCH_OBJ);
                $maxAdmin = $administratorManager->readById($maxEnquete->idAdministrateurEnChef)->fetch(PDO::FETCH_OBJ);
                $minAdmin=$administratorManager->readById($minEnquete->idAdministrateurEnChef)->fetch(PDO::FETCH_OBJ);

                //Formatage des temps
                $maxPerformanceTemps=$functions->formatageDateSecond($maxPerformanceTemps);
                $minPerformanceTemps=$functions->formatageDateSecond($minPerformanceTemps);





