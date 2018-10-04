<?php
                    $etapePrincipaleData=$enqueteManager->getListeEtapePrincipaleByEnqueteId($enquete->id);
                    $etapeIntermediaireData=$enqueteManager->getListeEtapeIntermediaireByEnqueteId($enquete->id);
                    $nbTotalEtape=$etapePrincipaleData->rowCount()+$etapeIntermediaireData->rowCount();
                    $nbEtapeTermine=0;
