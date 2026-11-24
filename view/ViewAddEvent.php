<?php

namespace View;

class ViewAddEvent extends View
{
    //ATTRIBUTS
    private string $message = '';
    private array $categories = [];

    //CONSTRUCTEUR

    //GETTER ET SETTER
    public function setMessage(string $newMessage): self
    {
        $this->message = $newMessage;
        return $this;
    }

    public function getCategories(): ?array
    {
        return $this->categories;
    }

    public function setCategories(array $data): self
    {
        $this->categories = $data;
        return $this;
    }

    //METHODS
    public function display(): void
    {
        ob_start();
?>
        <main>


            <nav aria-label="breadcrumb">
                <ul>
                    <li aria-label="Accueil"><a href="<?= $_ENV['accueil'] ?>">Accueil</a></li>
                    <li aria-label="Espace Organisateur"><a href="<?= $_ENV['espaceOrganisateur'] ?>">Espace Organisateur</a></li>
                    <li aria-current="page"><a>Ajouter un événement</a></li>
                </ul>
            </nav>

            <h1>Ajouter un evenement</h1>
            <form action="" method="post">
                <div>
                    <label for="title">Titre : </label>
                    <input type="text" id="title" name="title" placeholder="Fête locale de Belcaire" value="<?= $_POST['title'] ?? '' ?>" required>
                </div>
                <div>
                    <label for="village">Village : </label>
                    <input type="text" id="village" name="village" placeholder="Belcaire" value="<?= $_POST['village'] ?? '' ?>" required>
                </div>
                <div>
                    <label for="address">Adresse : </label>
                    <input type="text" id="address" name="address" placeholder="Place de l'école, 112340 Belcaire" value="<?= $_POST['address'] ?? '' ?>" required>
                </div>
                <div>
                    <label for="description">Description : </label>
                    <textarea id="description" name="description" required><?= $_POST['description'] ?? '' ?></textarea>
                </div>
                <div>
                    <label for="start_date">Date de début : </label>
                    <input type="date" id="start_date" name="start_date" min="<?= date("Y-m-d") ?>" max="9999-12-31" value="<?= $_POST['start_date'] ?? '' ?>" required>
                </div>
                <div>
                    <label for="end_date">Date de fin : </label>
                    <input type="date" id="end_date" name="end_date" min="<?= date("Y-m-d") ?>" max="9999-12-31" value="<?= $_POST['end_date'] ?? '' ?>" required>
                </div>
                <div>
                    <label for="start_time">Heure de début : </label>
                    <input type="time" id="start_time" name="start_time" value="<?= $_POST['start_time'] ?? '' ?>" required>
                </div>
                <div>
                    <label for="end_time">Heure de fin : </label>
                    <input type="time" id="end_time" name="end_time" value="<?= $_POST['end_time'] ?? '' ?>" required>
                </div>
                <div>
                    <label for="category">Catégory </label>
                    <select name="category_id" value="<?= $_POST['category_id'] ?? '' ?>" required>
                        <?php foreach ($this->getCategories() as $category) : ?>
                            <option value="<?= $category["id"] ?>"><?= $category["name"] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <input type="submit" name="ajouter" value="Ajouter mon événement">
            </form>

            <p><?php echo $this->message ?></p>

        </main>
<?php
        ob_end_flush();
    }
}
