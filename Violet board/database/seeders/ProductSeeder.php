<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Activity', 'price' => 23.90, 'is_discounted' => true, 'discounted_price' => 19.90,
            'description' => '<p><strong>Activity Original</strong> – kreatívna zábava pre celú rodinu!</p>
            <ul>
                <li>2 640 nových pojmov</li>
                <li>Vysvetľovanie: kreslenie, opis, pantomíma</li>
                <li>Pre 3–16 hráčov od 12 rokov</li>
                <li>Dĺžka hry: 60 min</li>
            </ul>',
            'min_age' => 12,
            'min_players' => 3,
            'max_players' => 16,
            'categories' => ['rodinne', 'party'],        
            ],
            ['name' => 'Bang', 'price' => 20.99, 'is_best_seller' => true,
            'description' => '
                <p><strong>Bang!</strong> – Divoká západná kartová jazda!</p>
                <p>Naháňačka na Divokom západe začína! Šerif, banditi, odpadlík a pomocníci – každý má svoju skrytú úlohu. Cieľ? Šerif prežije, banditi ho zabijú, odpadlík vyhrá sám!</p>
                <ul>
                    <li><strong>Tajné identity</strong> – nikto nevie, kto je kto</li>
                    <li><strong>Dynamické súboje</strong> – vystrieľajte súperov dávkou kariet</li>
                    <li><strong>Strategické rozhodnutia</strong> – kedy útočiť a kedy sa brániť?</li>
                </ul>
                <p>V balení nájdete: 110 kariet a pravidlá v slovenčine/češtine.</p>
                <p><em>Pre 4–7 hráčov od 10 rokov. Dĺžka hry: 20 – 40 min.</em></p>
            ',
            'min_age' => 10,
            'min_players' => 4,
            'max_players' => 7,
            'categories' => ['rodinne', 'karty', 'party'],
            ],
            ['name' => 'Blafuj', 'price' => 10.00, 'is_new' => true,
              'description' => '
                    <p><strong>Oblafni priateľov zo svojej party,</strong><br>
                    jasnú šancu vyhrať máš.<br>
                    No ak sa ti stanú štyri zhodné karty,<br>
                    namiesto výhry - prehrávaš!</p>
                    <p>Blafovacia kartová hra s obrázkami zvieratiek, ktoré nemá (skoro) nikto rád.</p>
                    <p><strong>Obsah hry:</strong> 64 hracích kariet (s ôsmymi rôznymi druhmi zvieratiek), pravidlá.</p>
                    <p><em>Ideálna pre 2–6 hráčov od 8 rokov. Dĺžka hry: 30 min.</em></p>
                ',
                'min_age' => 8,
                'min_players' => 2,
                'max_players' => 6,
                'categories' => ['karty', 'rodinne', 'party'],  
             ],
            ['name' => 'Brainbox abc', 'price' => 17.99, 'is_best_seller' => true,
            'description' => '
                <p>Táto vzdelávacia hra precvičí detskú pamäť a pozorovacie schopnosti zábavnou formou. Cieľ? Za 10 minút získať čo najviac kariet správnym zodpovedaním otázok.</p>
                <p>Deti sa učia:</p>
                <ul>
                    <li>Rozpoznávať písmená</li>
                    <li>Základy čítania</li>
                    <li>Fonetiku podľa školských osnov</li>
                </ul>
                <p>Jednoduché pravidlá – stačí pozorne sledovať obrázky na kartách a odpovedať.</p>
                <p><strong>Balenie obsahuje:</strong> 55 kariet, presýpacie hodiny, kocku a pravidlá.</p>
                <p><em>Ideálne pre deti od 4 rokov!</em></p>
            ',
            'min_age' => 4,
            'min_players' => 1,
            'max_players' => 6,
            'categories' => ['vedomostne', 'deti', 'rodinne'],
            ],
            ['name' => 'Citadela', 'price' => 17.89, 'is_new' => true,
            'description' => '
                <p>V tejto taktickej hre pre 2–8 hráčov (od 10 rokov) budujete najhodnotnejšie mesto pomocou unikátnych postáv.</p>
                <p>Každé kolo si <strong>tajne vyberáte postavu</strong> so špeciálnou schopnosťou, ktorá určuje poradie ťahov a možnosti akcií.</p>
                <p>Hra končí, keď niekto postaví 7–8 budov, potom sa hodnotia body za budovy a bonusy.</p>
                <p><strong>Balenie obsahuje:</strong><br>
                27 kariet postáv, 87 kariet budov, drevené mince a korunu.</p>
                <p><em>Dĺžka hry: 30 – 60 min.</em></p>
            ',
            'min_age' => 10,
            'min_players' => 2,
            'max_players' => 8,
            'categories' => ['strategia', 'rodinne', 'karty'],
            ],
            ['name' => 'Človeče', 'price' => 6.99, 'is_discounted' => true, 'discounted_price' => 5.99,
            'description' => '
                <p><strong>Človeče, nehnevaj sa</strong> – klasika plná napätia!</p>
                <p>Táto legendárna hra pre 2–4 hráčov rozvíja stratégie aj nervy. Cieľ? Presunúť všetky 4 figúrky z domčeka na finálové políčko.</p>
                <p>Jednoduché pravidlá skrývajú drsné súboje – <strong>súpera môžete vyhodiť</strong> a poslať ho na začiatok!</p>
                <p><strong>Hra vhodná pre celú rodinu (od 6 rokov)</strong> prináša: herný plán, 16 farebných figúrok, hraciu kocku.</p>
                <p><em>Zabaví na dovolenkách, chate aj doma. Pozor – dokáže odhaliť pravú povahu hráčov!</em></p>
            ',
            'min_age' => 6,
            'min_players' => 2,
            'max_players' => 4,
            'categories' => ['rodinne', 'strategia', 'deti'],    
            ],
            ['name' => 'Cortex', 'price' => 14.99, 'is_best_seller' => true,
            'description' => '
                <p><strong>Cortex 2</strong> – Šialený tréning pre váš mozog!</p>
                <p>Táto dynamická hra testuje 8 rôznych schopností: od logiky po hmatové vnímanie. Hráči <strong>súperia v rýchlosti</strong>, riešiac rozmanité úlohy pod časovým tlakom.</p>
                <p><strong>Hlavné črty:</strong><br>
                • 8 typov výziev (pamäť, postreh, hmat atď.)<br>
                • Kompatibilita s prvým Cortexom<br>
                • Cieľ: ako prvý zložiť 4 dielky mozgu</p>
                <p><em>Ideálna pre 2–6 hráčov od 8 rokov, ktorí sa chcú zabaviť a potrápiť myšlienkové pochody!</em></p>
            ',
            'min_age' => 8,
            'min_players' => 2,
            'max_players' => 6,
            'categories' => ['rodinne', 'pamat', 'vedomostne'],
            ],
            ['name' => 'Desiatka', 'price' => 20.50, 'is_new' => true,
            'description' => '
                <p><strong>Desiatka</strong> – Hra, kde čakanie neexistuje!</p>
                <p>Táto inovatívna hra odstraňuje nudné čakanie na ťah – všetci hráči <strong>súčasne hádajú odpovede</strong> na 10 otázok z každého okruhu. Za správne odpovede získavate žetóny, no môžete aj riskovať: hľadať ďalšie odpovede a získať viac bodov, alebo <em>prísť o už získané</em>.</p>
                <p><strong>Obsah hry:</strong><br>
                • 200 rôznych okruhov (2000 otázok)<br>
                • Kompaktný smartbox ideálny na cesty<br>
                • 100 obojstranných kariet a 10 žetónov</p>
                <p><em>Perfektná pre 2–6 hráčov od 10 rokov, ktorí chcú vzdelávanie spojené so vzrušením a strategiou!</em></p>
                <p>Dĺžka hry: 20 min.</p>
            ',
            'min_age' => 10,
            'min_players' => 2,
            'max_players' => 6,
            'categories' => ['rodinne', 'vedomostne', 'party'],      
            ],
            ['name' => 'Dixit', 'price' => 19.99, 'is_best_seller' => true,
            'description' => '
                <p><strong>Dixit</strong> – Kúzlo predstavivosti!</p>
                <p>Geniálne jednoduchá hra, kde 84 krásnych ilustrácií ožíva vašou fantáziou. <strong>Rozprávač</strong> popíše kartu vlastnými slovami, ostatní vyberajú zo svojich tú najvhodnejšiu. Zamiešané karty sa odhalia a všetci hádajú pôvodnú.</p>
                <p>Dokonalá balancia medzi kreativitou a taktikou – príliš očividný opis neprinesie body. Hra rozvíja predstavivosť a vzájomné porozumenie.</p>
                <p><em>Ideálna pre 3–8 hráčov od 8 rokov. V balení nájdete karty, drevené figúrky, hraciu dosku a pravidlá. Dixit je viac než hra – je to spoločenský zážitok plný prekvapení!</em></p>
                <p>Dĺžka hry: 30 min.</p>
            ',
            'min_age' => 8,
            'min_players' => 3,
            'max_players' => 8,
            'categories' => ['rodinne', 'party'],
            ],
            ['name' => 'Dobble', 'price' => 6.50, 'is_new' => true,
            'description' => '
                <p><strong>Dobble</strong> – Šialená hra rýchlosti a postrehu!</p>
                <p>5 hier v jednej s jednoduchým princípom: <strong>nájsť spoločný symbol na kartách</strong>. Každé dve karty majú len jeden zhodný obrázok!</p>
                <p><strong>Výhody hry:</strong><br>
                • 55 kruhových kariet s 50 symbolmi<br>
                • 5 rôznych herných variantov<br>
                • Okamžité pochopenie pravidiel<br>
                • Vhodné pre deti aj dospelých</p>
                <p>Hra rozvíja reflexy, postreh a zabaví celú rodinu. Uložené v praktickej plechovej krabičke.</p>
                <p><em>Perfektná pre 2–8 hráčov od 6 rokov.</em></p>
                <p>Dĺžka hry: 10 min.</p>
            ',
            'min_age' => 6,
            'min_players' => 2,
            'max_players' => 8,
            'categories' => ['rodinne', 'karty', 'deti'],
            ],
            ['name' => 'Domino', 'price' => 4.99, 'is_discounted' => true, 'discounted_price' => 3.99,
            'description' => '
                <p><strong>Domino</strong> – Klasická stratégia s číselnými kameňmi!</p>
                <p>Hra pre 2–4 hráčov od 6 rokov, kde spojíte rovnaké čísla na kameňoch. Cieľ? Zbaviť sa všetkých kameňov ako prvý alebo získať najviac bodov.</p>
                <p>Balenie obsahuje 28 obojstranných kameňov.</p>
                <p><em>Dĺžka hry: 15 min.</em></p>
            ',
            'min_age' => 6,
            'min_players' => 2,
            'max_players' => 4,
            'categories' => ['strategia'],    
            ],
            ['name' => 'Exploding Kittens', 'price' => 24.99, 'is_best_seller' => true,
            'description' => '
                <p><strong>Exploding Kittens: Dobro vs. Zlo</strong> – kde mačky a výbuchy spájajú zábavu s nevypočitateľným chaosom!</p>
                <p>V tejto šialenej kartovej hre sa ocitnete v stredu večného súboja medzi dobrom a zlom. Cieľ je jednoduchý: prežiť! Postupne ťaháte karty z balíčka, no varujte sa – ak narazíte na Výbušnú mačku, končíte! Našťastie máte k dispozícii záchranné karty ako Odklápač alebo Laserové ukazovátko, ktoré vás môžu zachrániť. Ale pozor, súperi vám môžu výbuch podsunúť späť!</p>
                <p>V pevnej škatuľke nájdete všetko pre okamžité začatie hry: 55 kariet (vrátane exkluzívnych Armageddon kariet), hernú podložku a podrobné pravidlá.</p>
                <p><em>Ideálne pre 2–5 hráčov od 7 rokov.</em></p>
                <p><em>Dĺžka hry: 15 min.</em></p>
            ',
            'min_age' => 7,
            'min_players' => 2,
            'max_players' => 5,
            'categories' => ['party', 'karty'],
            ],
            ['name' => 'Fabio', 'price' => 9.50, 'is_new' => true,
            'description' => '
                <p><strong>Žaba - trojvrstvové puzzle</strong> rozpráva vývojový príbeh žabky: od vajíčka cez mláďa po dospelú žabu. Každá vrstva zobrazuje inú životnú fázu v tom istom prostredí.</p>
                <p>Tieto originálne trojvrstvové puzzle sú ideálne pre deti (3+), ktoré radi skladajú a učia sa prírodovedné zákonitosti!</p>
            ',
            'min_age' => 3,
            'min_players' => 1,
            'max_players' => 1,
            'categories' => ['deti', 'puzzle'],
            ],
            ['name' => 'Iq Link', 'price' => 11.99, 'is_best_seller' => true,
            'description' => '
                <p><strong>IQ Link</strong> je logická výzva v kapse! Táto geniálna hra testuje vaše priestorové myslenie. Cieľ: správne poskladať 36 dielikov na 24 miest pomocou ich prepojenia (krúžok a gulička sa môžu zlúčiť!).</p>
                <p>Ideálna pre deti aj dospelých od 8 rokov.</p>
            ',
            'min_age' => 8,
            'min_players' => 1,
            'max_players' => 1,
            'categories' => ['strategia', 'deti'],    
            ],
            ['name' => 'Jenga', 'price' => 8.50, 'is_new' => true,
            'description' => '
                <p><strong>Jenga</strong> je napínavá hra zručnosti a trpezlivosti! Klasická hra, kde hráči striedavo vytŕhajú drevený kameň z veže a ukladajú ich navrch. Cieľom je nezhodiť vežu – ten, kto spôsobí pád, prehráva!</p>
                <p>Postavte vežu z 18 poschodí (každé z 3 kameňov). Ťahajte a ukladajte kameň jednou rukou. Nové poschodie musí byť dokončené pred začatím ďalšieho.</p>
                <p>Obsah balenia: 54 drevených kameňov (veža má výšku 32 cm po postavení).</p>
                <p>Ideálna pre 2-8 hráčov od 6 rokov. Dĺžka hry: 20 min.</p>
            ',
            'min_age' => 6,
            'min_players' => 2,
            'max_players' => 8,
            'categories' => ['party', 'rodinne'],
            ],
            ['name' => 'Meme', 'price' => 30.00, 'is_discounted' => true, 'discounted_price' => 25.00,
            'description' => '
                <p><strong>What Do You Meme?</strong> je zábavná spoločenská hra, ktorá testuje váš zmysel pre humor. Princíp je jednoduchý: kombinujete obrázkové karty s textovými a vytvárate čo najvtipnejšie memes. V každom kole iný hráč rozhoduje, ktorá kombinácia zvíťazí.</p>
                <p>Ideálna pre 3-20 hráčov od 18 rokov. Dĺžka hry: 10 – 60 min.</p>
            ',
            'min_age' => 18,
            'min_players' => 3,
            'max_players' => 20,
            'categories' => ['karty', 'party'],
            ],
            ['name' => 'Monopoly', 'price' => 40.00, 'is_best_seller' => true,
            'description' => '
                <p><strong>Monopoly: Chudák</strong> je unikátna verzia klasickej hry Monopoly, kde sa vyplatí byť „chudák“! Cieľom je získať špeciálne mince útěchy, ktoré môžete vymeniť za výhody – čím viac strácate, tým lepšie bonusy získavate.</p>
                <p><strong>Novinky:</strong></p>
                <ul>
                    <li>Mince útěchy – menia sa na cenné výhody</li>
                    <li>Figurka pana Monopolyho – prináša exkluzívne bonusy</li>
                    <li>Karty Šanca a Pokladňa s novými možnosťami</li>
                </ul>
                <p>Hra obsahuje klasické pravidlá Monopoly, no s prevratnou stratégiou – niekedy sa oplatí prehrať, aby ste nakoniec vyhrali!</p>
            ',
            'min_age' => 8,
            'min_players' => 2,
            'max_players' => 6,
            'categories' => ['strategia', 'rodinne'],
            ],
            ['name' => 'Pexesohm', 'price' => 7.50, 'is_new' => true,
            'description' => '
                <p><strong>Vedomostné pexeso – Hlavné mestá sveta</strong> je klasické pexeso s twistom! Namiesto obrázkov spájate hlavné mesto s príslušným štátom. Základné pravidlá ostávajú – hľadáte dvojice, ale tentoraz s prídavkom vzdelávania.</p>
                <p>Ideálne pre deti aj dospelých, ktorí sa chcú zabaviť a zároveň naučiť. Skvelý spôsob, ako otestovať a rozšíriť svoje znalosti o geografii!</p>
            ',
            'min_age' => 12,
            'min_players' => 2,
            'max_players' => 6,
            'categories' => ['vedomostne', 'deti', 'pamat'],
        ],
            ['name' => 'Puzzle Kvet', 'price' => 9.99, 'is_best_seller' => true,
            'description' => '
                <p><strong>Drevené puzzle – Kvetinová dekorácia</strong> sú elegantné drevené puzzle v tvare ružového karafiátu (klinčeka), ktoré poslúžia ako originálna domáca dekorácia. Vďaka modulárnemu dizajnu vytvoríte rôzne aranžmá podľa nálady, čím si prispôsobíte vzhľad podľa aktuálnej atmosféry.</p>
                <p>Ideálne pre milovníkov prírodných dekorácií a kreatívnej tvorivosti! Oživte svoj interiér originálnym a prírodným spôsobom.</p>
            ',
            'min_age' => 10,
            'min_players' => 1,
            'max_players' => 1,
            'categories' => ['puzzle'],
        ],
            ['name' => 'Puzzle Lalia', 'price' => 10.50, 'is_new' => true,
            'description' => '
                <p><strong>Puzzle Vodná lalia</strong> je exkluzívna limitovaná edícia, ktorá ponúka 1000 dielikov s fascinujúcou fotografiou "Water Lily" od Irawana Subingara. Po zložení získate umelecké dielo v rozmere 48 x 68,3 cm, ktoré prináša krásu prírody do vášho domova.</p>
                <p>Ideálne pre tých, ktorí oceňujú kvalitné umelecké spracovanie a fascinujúce prírodné motívy. Skvelý spôsob, ako splynúť s prírodou a zároveň si vychutnať zábavu pri skladaní puzzle.</p>
            ',
            'min_age' => 14,
            'min_players' => 1,
            'max_players' => 1,
            'categories' => ['puzzle'],
        ],
            ['name' => 'Saboter', 'price' => 10.99, 'is_discounted' => true, 'discounted_price' => 8.99,
            'description' => '
                <p>Hráči sa stávajú buď zlatokopmi, alebo sabotérmi v podzemných tuneloch. Zlatokopi spolupracujú na nájdení pokladu, zatiaľ čo sabotéri tajne kladú prekážky. Nikdy neviete, kto je kým! Cieľom hry je buď nájsť poklad, alebo sabotovať plán ostatných hráčov.</p>
                <p>Balenie obsahuje 110 kariet, vrátane akčných kariet a nugetov, ktoré zvyšujú dynamiku hry. Hra plná napätia a nečakaných zvratov!</p>
            ',
            'min_age' => 8,
            'min_players' => 3,
            'max_players' => 10,
            'categories' => ['karty', 'party'],
        ],
            ['name' => 'Scrabble', 'price' => 9.99, 'is_best_seller' => true,
            'description' => '
                <p>V tejto svetoznámej hre pre 2-4 hráčov skladáte slová z písmenkových kameňov na hracej ploche 15x15. Každé písmeno má svoju bodovú hodnotu podľa frekvencie výskytu v jazyku, čo pridáva strategický rozmer.</p>
                <p>Hra rozvíja: slovnú zásobu, strategické myslenie a logické uvažovanie, a je ideálna na rodinné večery aj vzdelávacie aktivity.</p>
                <p>Balenie obsahuje: 110 písmen, 4 stojany, hraciu dosku a pravidlá.</p>
            ',
            'min_age' => 8,
            'min_players' => 2,
            'max_players' => 4,
            'categories' => ['rodinne'],
        ],
            ['name' => 'Túry mury', 'price' => 7.50, 'is_new' => true,
            'description' => '
                <p>Táto originálna kartová hra pre 3-5 hráčov (od 7 rokov) mení pravidlá – podvádzanie tu nie je zakázané, ale priamo vyžadované! Cieľom je zbaviť sa všetkých kariet ako prvý, a to aj trikmi: schovávaním kariet v rukáve či pod stolom.</p>
                <p>Hra obsahuje: 72 kariet (akčné, číselné a špeciálne "Túry Můry"), figúrku strážneho chrobáka na odhaľovanie podvodníkov a pravidlá v češtine.</p>
            ',
            'min_age' => 7,
            'min_players' => 3,
            'max_players' => 5,
            'categories' => ['karty', 'strategia', 'party'],
        ],
            ['name' => 'Uno Deluxe', 'price' => 9.09, 'is_best_seller' => true,
            'description' => '
                <p>Zábava, ktorá nikdy nekončí! Cieľom je dosiahnuť 500 bodov – zbav sa kariet ako prvý! Akčné karty menia hru a krik "UNO!" keď máš poslednú kartu, je povinný.</p>
                <p>Rýchla, šialená hra pre všetky veky!</p>
                <p>V balení: 108 kariet, návod, bodovacia podložka a pevná škatuľka.</p>
            ',
            'min_age' => 7,
            'min_players' => 2,
            'max_players' => 10,
            'categories' => ['karty', 'rodinná'],      
        ],
        ];

        $allCategories = Category::all();

        foreach ($products as $data) {
            $categories = $data['categories'] ?? [];
            unset($data['categories']);

            $product = Product::create($data);

            $slugName = Str::slug($product->name);
            ProductImage::create([
                'product_id' => $product->id,
                'filename' => $slugName . '1.jpg'
            ]);
            ProductImage::create([
                'product_id' => $product->id,
                'filename' => $slugName . '2.jpg'
            ]);

            foreach ($categories as $categorySlug) {
                $category = Category::where('slug', $categorySlug)->first();
                if ($category) {
                    $product->categories()->attach($category->id);
                }
            }
        }
    }
}