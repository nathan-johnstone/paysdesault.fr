<?php

namespace View;

class ViewConnexion extends View
{
    //ATTRIBUTS
    private string $message = '';

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function setMessage(string $newMessage): self
    {
        $this->message = $newMessage;
        return $this;
    }

    //METHODS
    public function display(): void
    {
        ob_start();
?>
        <main>

            <h1>Connexion</h1>
            <form action="" method="post">
                <div>
                    <label for="email">Email : </label>
                    <input type="text" id="email" name="email" placeholder="exemple@exepmle.fr" required>
                </div>
                <div>
                    <label for="password">Mot de Passe : </label>
                    <input type="password" id="password" name="password" placeholder="************" required>
                </div>
                <input type="submit" name="connexion" value="Se Connecter">
            </form>

            <p><?= $this->message ?></p>

        </main>
<?php
        ob_end_flush();
    }
}
