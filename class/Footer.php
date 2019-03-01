    <?php
    /**
     * Created by PhpStorm
     * User: admin
     * Date: 26/09/2018
     * Time: 16:39
     * Classe du footer en Objet
     */
    class Footer {

        private $footer;

        public function getFooter() {
            echo "<footer class='footer' style='background-color:#ffd130;'>
                          
                        <div class='container'>
                              <a href='mentions.php'>Mentions légales</a>
                              <a href='mailto:admin@asetar08.fr'>Contacter l'administrateur</a>
                              <a href='#'>Plan du site</a>
                        </div>
                 </footer>
                 </body>   
                 <html>";
        }

        public function setFooter($footer): void {
            $this->footer = $footer;
        }
    }