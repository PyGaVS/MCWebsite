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
    case "reset" :
        resetChat();
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
        hp INT,
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
                ["Creeper", "Creeper", 20],
                ["Zombie", "Zombie", 20],
                ["Skeleton", "Squelette", 20],
                ["Spider", "Araignée", 16],
                ["Cave Spider", "Araignée venimeuse", 12],
                ["Enderman", "Enderman", 40],
                ["Witch", "Sorcière", 26],
                ["Slime", "Slime", 1],
                ["Magma Cube", "Cube de Magma", 4],
                ["Blaze", "Blaze", 20],
                ["Ghast", "Ghast", 10],
                ["Wither Skeleton", "Squelette Wither", 20],
                ["Guardian", "Gardien", 30],
                ["Elder Guardian", "Gardien Ancien", 80],
                ["Drowned", "Noyé", 20],
                ["Zombie Villager", "Villageois Zombie", 20],
                ["Husk", "Husk", 20],
                ["Stray", "Vagabond", 20],
                ["Polar Bear", "Ours polaire", 30],
                ["Wolf", "Loup", 8],
                ["Ocelot", "Ocelot", 10],
                ["Cat", "Chat", 10],
                ["Cow", "Vache", 10],
                ["Pig", "Cochon", 10],
                ["Sheep", "Mouton", 8],
                ["Chicken", "Poulet", 4],
                ["Rabbit", "Lapin", 3],
                ["Bat", "Chauve-souris", 6],
                ["Squid", "Calamar", 10],
                ["Dolphin", "Dauphin", 10],
                ["Turtle", "Tortue", 30],
                ["Panda", "Panda", 20],
                ["Villager", "Villageois", 20],
                ["Iron Golem", "Golem de fer", 100],
                ["Snow Golem", "Golem de neige", 4],
                ["Ender Dragon", "Dragon de l\'Ender", 200],
                ["Wither", "Wither", 300],
                ["Phantom", "Phantom", 20],
                ["Evoker", "Évocateur", 24],
                ["Vex", "Vex", 14],
                ["Pillager", "Pillard", 24],
                ["Ravager", "Ravageur", 100],
                ["Vindicator", "Vindicateur", 24],
                ["Illusioner", "Illusionniste", 32],
                ["Bee", "Abeille", 10],
                ["Piglin", "Piglin", 16],
                ["Hoglin", "Hoglin", 40],
                ["Zoglin", "Zoglin", 40],
                ["Strider", "Dilème", 20],
                ["Piglin Brute", "Piglin barbare", 50],
                ["Axolotl", "Axolotl", 14],
                ["Glow Squid", "Calamar luisant", 10],
                ["Goat", "Chèvre", 12],
                ["Warden", "Gardien", 300],
            ];
        foreach($mobs as $mob) {
            echo (0 ==Mob::create($mob)) ? '-' : 'x';
        }

        echo " done\n";
    }    
    //mob
    seedMobs();
}
function resetChat() {
    echo "RESETING CHAT TABLE :";
    echo (0 == Connection::exec('TRUNCATE chat')) ? '-' : 'x';
}


