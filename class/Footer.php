    <?php
    /**
     * Created by PhpStorm
     * User: admin
     * Date: 26/09/2018
     * Time: 16:39
     * Classe du footer en Objet
     */
    class Footer {

        public function getFooter() {
            return "<footer class='footer' style='background-color:#ffd130;'>
                          
                        <div class='container'>
                              <a href='./mentions.php'>Mentions légales</a>
                              <a href='mailto:admin@asetar08.fr'>Contacter l'administrateur</a>
                        </div>
                 </footer>";
        }
    }