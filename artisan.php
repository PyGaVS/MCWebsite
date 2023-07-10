<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
ini_set('display_startup_errors',true);

include('./config/env.php');

foreach (glob('./data/*.php') as $file) {
    include($file);
}

foreach (glob('./data/model/*.php') as $file) {
    include($file);
}

foreach (glob('./control/*.php') as $file) {
    include($file);
}

switch ($argv[1]) {
    case "migrate" :
        artisan_migrate();
        break;
    case "seed" :
        artisan_seed();
        break;
    default :
        var_dump(" This option doesn't exist !");
        break;
}


function artisan_migrate() {
    artisan_migrate_minimum();
    //artisan_migrate_project();
}


function artisan_seed() {
    artisan_seed_minimum();
    //artisan_seed_project();
}


function artisan_migrate_project() {
    // Here is the begining of your project. You can create all the tables you need
    // A example is made with a table named "example"

    // First :  drop the tables if exists
    echo "DROPPING ALL YOUR TABLES : ";
    echo (0 ==Connection::exec('SET FOREIGN_KEY_CHECKS=0;')) ? '-' : 'x';
    echo (0 ==Connection::exec('SET FOREIGN_KEY_CHECKS=1;')) ? '-' : 'x';
    echo " done";

    // Second : create your tables
    /*
    echo "\nCREATING ALL YOUR TABLES : ";
    $request =  'CREATE TABLE IF NOT EXISTS example (
        id int AUTO_INCREMENT PRIMARY KEY,
        libelle VARCHAR(255)
        );';
    echo (0 ==Connection::exec($request)) ? '-' : 'x';
    */
    echo " done";

    // Third : Alter tables to add Foreign Keys
    echo "\nADDING ALL YOUR FOREIGN KEYS : ";

    // your foreign keys
    echo " done";
    echo "\n";

}

function artisan_seed_project() {
    // Here is the beginning of your project. You can seed all the tables you need
    // A exemple is made with a table named "exemple"

    // First : empty your tables
    echo "EMPTY ALL YOUR TABLES : ";
    echo (0 == Connection::exec('SET FOREIGN_KEY_CHECKS=0;')) ? '-' : 'x';
    echo (0 == Connection::exec('SET FOREIGN_KEY_CHECKS=1;')) ? '-' : 'x';
    echo " done\n";

    function seed_exemple($nbRows){
        /*
        echo "ADD RECORDS IN TABLE example : ";
        $faker = Faker\Factory::create('fr_FR');

        for ($i=0;$i<$nbRows;$i++){
            // Add a new random record in the table
            $row = [
                'libelle' => $faker->text()
            ];

            Connection::insert('example', $row, 'Service');
            echo "-";
        }
        */
        echo " done\n";
    }

    // Thrid : calls the seeders functions here
    seed_exemple(100);
}


function artisan_migrate_minimum() {

    // First : drop tables if exists
    echo "DROPPING ALL MINIMUM TABLES : ";
    echo (0 ==Connection::exec('SET FOREIGN_KEY_CHECKS=0;')) ? '-' : 'x';
    echo (0 ==Connection::exec('DROP TABLE IF EXISTS mob;')) ? '-' : 'x';
    echo (0 ==Connection::exec('DROP TABLE IF EXISTS chat;')) ? '-' : 'x';
    echo (0 ==Connection::exec('SET FOREIGN_KEY_CHECKS=0;')) ? '-' : 'x';
    echo " done";
    // Second : Create tables
    echo "\nCREATING ALL MINIMUM TABLES : ";

    #mob
    $request =  'CREATE TABLE IF NOT EXISTS mob (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        name_fr VARCHAR(255),
        score INT
        );';
    echo (0 ==Connection::exec($request)) ? '-' : 'x';

    #chat
    $request =  'CREATE TABLE IF NOT EXISTS chat (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        content TEXT(1023),
        date DATETIME DEFAULT CURRENT_TIMESTAMP,
        color VARCHAR(255)
        );';
    echo (0 ==Connection::exec($request)) ? '-' : 'x';

    //service_id INT UNSIGNED REFERENCES service(id) : pour clé étrangère
    echo " done";

    // Third : Alter tables to add Foreign Keys
    /*
    echo "\nENABLE FOREIGN KEYS : ";
    echo (0 ==Connection::exec('SET FOREIGN_KEY_CHECKS=1;')) ? '-' : 'x';
    echo " done";

    echo "\nADDING ALL MINIMUM FOREIGN KEYS : ";
    $request =  'ALTER TABLE devis
                ADD CONSTRAINT fk1_utilisateur_id
                FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id)
                ON DELETE RESTRICT
                ON UPDATE RESTRICT;';
    echo (0 ==Connection::exec($request)) ? '-' : 'x';
    echo " done";
    */
    echo "\n";
    

}

function artisan_seed_minimum() {

    // First : empty tables
    echo "EMPTY ALL MINIMUM TABLES : ";
    echo (0 == Connection::exec('SET FOREIGN_KEY_CHECKS=0;')) ? '-' : 'x';
    echo (0 == Connection::exec('TRUNCATE mob')) ? '-' : 'x';
    echo (0 == Connection::exec('SET FOREIGN_KEY_CHECKS=1;')) ? '-' : 'x';
    echo " done\n";

    // second : seed tables

    function seedMobs(){
        echo "ADD RECORDS IN TABLE mob: ";
        /*$request = "INSERT INTO `mob` (`id`, `name`,`name_fr`, `score`) VALUES 
            (NULL, 'Cow', 'Vache', '0'),
            (NULL, 'Enderman', 'Enderman', '0'), 
            (NULL, 'Chicken', 'Poule', '0'),
            (NULL, 'Horse', 'Cheval', '0'),
            (NULL, 'Cat', 'Chat', '0'),
            (NULL, 'Mooshroom', 'Champimeuh', '0'),
            (NULL, 'Llama', 'Lama', '0'),
            (NULL, 'Trader_llama', 'Lama_de_marchand', '0'),
            (NULL, 'Pufferfish', 'Poisson-globe', '0'),
            (NULL, 'Snow_golem', 'Golem_de_neige', '0'),
            (NULL, 'Iron_golem', 'Golem_de_fer', '0'),
            (NULL, 'Slime', 'Slime', '0'),
            (NULL, 'Zombie', 'Zombie', '0'),
            (NULL, 'Squelette', 'Skeleton', '0'),
            (NULL, 'Vagabond', 'Stray', '0'),
            (NULL, 'Pig', 'Cochon', '0'),
            (NULL, 'Sheep', 'Mouton', '0')
            ";
            echo (0 ==Connection::exec($request)) ? '-' : 'x';*/

            $mobs = [
                ["Creeper", "Creeper"],
                ["Zombie", "Zombie"],
                ["Skeleton", "Squelette"],
                ["Spider", "Araignée"],
                ["Cave Spider", "Araignée de grotte"],
                ["Enderman", "Enderman"],
                ["Witch", "Sorcière"],
                ["Slime", "Slime"],
                ["Magma Cube", "Cube de Magma"],
                ["Blaze", "Blaze"],
                ["Ghast", "Ghast"],
                ["Wither Skeleton", "Squelette Wither"],
                ["Guardian", "Gardien"],
                ["Elder Guardian", "Gardien Ancien"],
                ["Drowned", "Noyé"],
                ["Zombie Villager", "Villageois Zombie"],
                ["Husk", "Husk"],
                ["Stray", "Égaré"],
                ["Polar Bear", "Ours polaire"],
                ["Wolf", "Loup"],
                ["Ocelot", "Ocelot"],
                ["Cat", "Chat"],
                ["Cow", "Vache"],
                ["Pig", "Cochon"],
                ["Sheep", "Mouton"],
                ["Chicken", "Poulet"],
                ["Rabbit", "Lapin"],
                ["Bat", "Chauve-souris"],
                ["Squid", "Calamar"],
                ["Dolphin", "Dauphin"],
                ["Turtle", "Tortue"],
                ["Panda", "Panda"],
                ["Villager", "Villageois"],
                ["Iron Golem", "Golem de fer"],
                ["Snow Golem", "Golem de neige"],
                ["Ender Dragon", "Dragon de l\'Ender"],
                ["Wither", "Wither"],
                ["Phantom", "Phantom"],
                ["Evoker", "Évocateur"],
                ["Vex", "Vex"],
                ["Pillager", "Pillard"],
                ["Ravager", "Ravageur"],
                ["Vindicator", "Vindicateur"],
                ["Illusioner", "Illusionniste"],
                ["Bee", "Abeille"],
                ["Piglin", "Cochonlin"],
                ["Hoglin", "Hoglin"],
                ["Zoglin", "Zoglin"],
                ["Strider", "Dilème"],
                ["Piglin Brute", "Cochonlin brutal"],
                ["Axolotl", "Axolotl"],
                ["Glow Squid", "Calmar luisant"],
                ["Goat", "Chèvre"],
                ["Warden", "Gardien"]
            ];
        foreach($mobs as $mob) {
            echo (0 ==Mob::create($mob)) ? '-' : 'x';
        }

        echo " done\n";
    }
    
    //mob
    seedMobs();
}


