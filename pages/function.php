<?php
    function recupFile($file)
    {
        if(!empty($file))
        {
            $img= $file['img'];

            $tailleMax = 2097152;
            if($file['image']['size']<= $tailleMax)
            {
                $extensionValide = array('jpg', 'jpeg', 'gif', 'png');
        
                $extension = strtolower(substr(strrchr($file['image']['name'], '.'), 1));
                if(in_array($extension, $extensionValide))
                {
                    move_uploaded_file($img['tmp_name'], "../upload/".$img['name']);
                }
                else
                {
                    echo 'Fichier non pris en charge';
                }
            }
        }
    }
?>
