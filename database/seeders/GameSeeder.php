<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('games')->insert([
            'title' => 'Counter Strike Global Offensive',
            'image' => 'images/csgo.jpg',
            'desc' => 'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS content (de_dust2, etc.).',
            'price' => '0',
            'genre'=>'1',
            'PEGI_rating'=>'18'
        ]);
        \DB::table('games')->insert([
            'title' => "PLAYERUNKNOWN'S BATTLEGROUNDS",
            'image' => 'images/pubg.jpg',
            'desc' => "PUBG: BATTLEGROUNDS is a battle royale shooter that pits 100 players against each other in a struggle for survival. Gather supplies and outwit your opponents to become the last person standing.PUBG: BATTLEGROUNDS, aka Brendan Greene, is a pioneer of the battle royale genre and the creator of the battle royale game modes in the ARMA series and H1Z1: King of the Kill. At PUBG Corp., Greene is working with a veteran team of developers to make PUBG into the world's premiere battle royale experience.",
            'price' => '30',
            'genre' => '1',
            'PEGI_rating' => '18'
        ]);
        \DB::table('games')->insert([
            'title' => 'Apex Legends',
            'image' => 'images/apexlegends.png',
            'desc' => 'Apex Legends is a free-to-play battle royale-hero shooter game developed by Respawn Entertainment and published by Electronic Arts. It was released for Microsoft Windows, PlayStation 4, and Xbox One in February 2019, and for Nintendo Switch in March 2021. A mobile version of the game specially designed for touchscreens titled Apex Legends Mobile has also been announced which is scheduled to be fully released by 2022 on Android and iOS. The game supports cross-platform play.',
            'price' => '0',
            'genre' => '1',
            'PEGI_rating' => '18'
        ]);
        \DB::table('games')->insert([
            'title' => 'Grand Theft Auto V',
            'image' => 'images/gta5.png',
            'desc' => 'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.',
            'price' => '20',
            'genre' => '2',
            'PEGI_rating' => '18'
        ]);
        \DB::table('games')->insert([
            'title' => 'Terraria',
            'image' => 'images/terraria.jpg',
            'desc' => 'Dig, Fight, Explore, Build: The very world is at your fingertips as you fight for survival, fortune, and glory. Will you delve deep into cavernous expanses in search of treasure and raw materials with which to craft ever-evolving gear, machinery, and aesthetics? Perhaps you will choose instead to seek out ever-greater foes to test your mettle in combat? Maybe you will decide to construct your own city to house the host of mysterious allies you may encounter along your travels?',
            'price' => '5',
            'genre' => '2',
            'PEGI_rating' => '12'
        ]);
        \DB::table('games')->insert([
            'title' => 'Ark:Survival Evolved',
            'image' => 'images/arksurvival.jpg',
            'desc' => 'Stranded on the shores of a mysterious island, you must learn to survive. Use your cunning to kill or tame the primeval creatures roaming the land, and encounter other players to survive, dominate... and escape!',
            'price' => '10',
            'genre' => '3',
            'PEGI_rating' => '18'
        ]);
        \DB::table('games')->insert([
            'title' => 'Red Dead Redemption 2',
            'image' => 'images/rdr2.jpg',
            'desc' => 'America, 1899. Arthur Morgan and the Van der Linde gang are outlaws on the run. With federal agents and the best bounty hunters in the nation massing on their heels, the gang must rob, steal and fight their way across the rugged heartland of America in order to survive. As deepening internal divisions threaten to tear the gang apart, Arthur must make a choice between his own ideals and loyalty to the gang who raised him.',
            'price' => '50',
            'genre' => '4',
            'PEGI_rating' => '18'
        ]);
        \DB::table('games')->insert([
            'title' => 'Warcraft III:Reign of Chaos',
            'image' => 'images/warcraft3.jpg',
            'desc' => "Warcraft III is set several years after the events of Warcraft II, and tells the story of the Burning Legion's attempt to conquer the fictional world of Azeroth with the help of an army of the Undead, led by fallen paladin Arthas Menethil. It chronicles the combined efforts of the Human Alliance, Orcish Horde, and Night Elves to stop them before they can corrupt the World Tree.",
            'price' => '30',
            'genre' => '5',
            'PEGI_rating' => '18'
        ]);
        \DB::table('games')->insert([
            'title' => 'StarCraft II: Wings of Liberty',
            'image' => 'images/starcraft2.jpg',
            'desc' => 'StarCraft II: Wings of Liberty is a science fiction real-time strategy video game developed and published by Blizzard Entertainment. It was released worldwide in July 2010 for Microsoft Windows and Mac OS X.Like its predecessor, the game revolves around three species: the Terrans (humans), the Zerg (a super-species of assimilated life forms), and the Protoss (a technologically advanced species with vast psionic powers).',
            'price' => '0',
            'genre' => '5',
            'PEGI_rating' => '18'
        ]);

        \DB::table('games')->insert([
            'title' => 'Pac-Man',
            'image' => 'images/pac-man.jpg',
            'desc' => 'Pac-Man is a 1980 maze action video game developed and released by Namco for arcades. The original Japanese title of Puck Man was changed to Pac-Man for international releases as a preventative measure against defacement of the arcade machines by changing the P to an F. In North America, the game was released by Midway Manufacturing as part of its licensing agreement with Namco America. The player controls Pac-Man, who must eat all the dots inside an enclosed maze while avoiding four colored ghosts. Eating large flashing dots called "Power Pellets" causes the ghosts to turn blue, allowing Pac-Man to eat them for bonus points.',
            'price' => '400',
            'genre' => '6',
            'PEGI_rating' => '3'
        ]);
        \DB::table('games')->insert([
            'title' => 'Genshin Impact',
            'image' => 'images/genshinimpact.jpg',
            'desc' => 'Genshin Impact is an action role-playing game developed and published by miHoYo. It was released for Microsoft Windows, PlayStation 4, Android, and iOS in September 2020, PlayStation 5 in April 2021, and is planned for future release on Nintendo Switch. The game features an anime style open-world environment and an action-based battle system. The game is free-to-play and is monetized through gacha game mechanics. ',
            'price' => '0',
            'genre' => '7',
            'PEGI_rating' => '12'
        ]);
        \DB::table('games')->insert([
            'title' => "Assassin's Creed Odyssey",
            'image' => 'images/assasincreed.jpg',
            'desc' => "Choose your fate in Assassin's Creed® Odyssey. From outcast to living legend, embark on an odyssey to uncover the secrets of your past and change the fate of Ancient Greece.",
            'price' => '43',
            'genre' => '8',
            'PEGI_rating' => '18'
        ]);
    }
}
