<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

if(!function_exists( 'slain_google_fontname_list' )):

	function slain_google_fontname_list(){

		$google_font_list = array(

			'ABeeZee' => 'ABeeZee',
			'Abel' => 'Abel',
			'Abhaya Libre' => 'Abhaya Libre',
			'Abril Fatface' => 'Abril Fatface',
			'Aclonica' => 'Aclonica',
			'Acme' => 'Acme',
			'Actor' => 'Actor',
			'Adamina' => 'Adamina',
			'Advent Pro' => 'Advent Pro',
			'Aguafina Script' => 'Aguafina Script',
			'Akronim' => 'Akronim',
			'Aladin' => 'Aladin',
			'Alata' => 'Alata',
			'Alatsi' => 'Alatsi',
			'Aldrich' => 'Aldrich',
			'Alef' => 'Alef',
			'Alegreya' => 'Alegreya',
			'Alegreya SC' => 'Alegreya SC',
			'Alegreya Sans' => 'Alegreya Sans',
			'Alegreya Sans SC' => 'Alegreya Sans SC',
			'Aleo' => 'Aleo',
			'Alex Brush' => 'Alex Brush',
			'Alfa Slab One' => 'Alfa Slab One',
			'Alice' => 'Alice',
			'Alike' => 'Alike',
			'Alike Angular' => 'Alike Angular',
			'Allan' => 'Allan',
			'Allerta' => 'Allerta',
			'Allerta Stencil' => 'Allerta Stencil',
			'Allura' => 'Allura',
			'Almarai' => 'Almarai',
			'Almendra' => 'Almendra',
			'Almendra Display' => 'Almendra Display',
			'Almendra SC' => 'Almendra SC',
			'Amarante' => 'Amarante',
			'Amaranth' => 'Amaranth',
			'Amatic SC' => 'Amatic SC',
			'Amethysta' => 'Amethysta',
			'Amiko' => 'Amiko',
			'Amiri' => 'Amiri',
			'Amita' => 'Amita',
			'Anaheim' => 'Anaheim',
			'Andada' => 'Andada',
			'Andika' => 'Andika',
			'Andika New Basic' => 'Andika New Basic',
			'Angkor' => 'Angkor',
			'Annie Use Your Telescope' => 'Annie Use Your Telescope',
			'Anonymous Pro' => 'Anonymous Pro',
			'Antic' => 'Antic',
			'Antic Didone' => 'Antic Didone',
			'Antic Slab' => 'Antic Slab',
			'Anton' => 'Anton',
			'Arapey' => 'Arapey',
			'Arbutus' => 'Arbutus',
			'Arbutus Slab' => 'Arbutus Slab',
			'Architects Daughter' => 'Architects Daughter',
			'Archivo' => 'Archivo',
			'Archivo Black' => 'Archivo Black',
			'Archivo Narrow' => 'Archivo Narrow',
			'Aref Ruqaa' => 'Aref Ruqaa',
			'Arima Madurai' => 'Arima Madurai',
			'Arimo' => 'Arimo',
			'Arizonia' => 'Arizonia',
			'Armata' => 'Armata',
			'Arsenal' => 'Arsenal',
			'Artifika' => 'Artifika',
			'Arvo' => 'Arvo',
			'Arya' => 'Arya',
			'Asap' => 'Asap',
			'Asap Condensed' => 'Asap Condensed',
			'Asar' => 'Asar',
			'Asset' => 'Asset',
			'Assistant' => 'Assistant',
			'Astloch' => 'Astloch',
			'Asul' => 'Asul',
			'Athiti' => 'Athiti',
			'Atma' => 'Atma',
			'Atomic Age' => 'Atomic Age',
			'Aubrey' => 'Aubrey',
			'Audiowide' => 'Audiowide',
			'Autour One' => 'Autour One',
			'Average' => 'Average',
			'Average Sans' => 'Average Sans',
			'Averia Gruesa Libre' => 'Averia Gruesa Libre',
			'Averia Libre' => 'Averia Libre',
			'Averia Sans Libre' => 'Averia Sans Libre',
			'Averia Serif Libre' => 'Averia Serif Libre',
			'B612' => 'B612',
			'B612 Mono' => 'B612 Mono',
			'Bad Script' => 'Bad Script',
			'Bahiana' => 'Bahiana',
			'Bahianita' => 'Bahianita',
			'Bai Jamjuree' => 'Bai Jamjuree',
			'Baloo 2' => 'Baloo 2',
			'Baloo Bhai 2' => 'Baloo Bhai 2',
			'Baloo Bhaina 2' => 'Baloo Bhaina 2',
			'Baloo Chettan 2' => 'Baloo Chettan 2',
			'Baloo Da 2' => 'Baloo Da 2',
			'Baloo Paaji 2' => 'Baloo Paaji 2',
			'Baloo Tamma 2' => 'Baloo Tamma 2',
			'Baloo Tammudu 2' => 'Baloo Tammudu 2',
			'Baloo Thambi 2' => 'Baloo Thambi 2',
			'Balsamiq Sans' => 'Balsamiq Sans',
			'Balthazar' => 'Balthazar',
			'Bangers' => 'Bangers',
			'Barlow' => 'Barlow',
			'Barlow Condensed' => 'Barlow Condensed',
			'Barlow Semi Condensed' => 'Barlow Semi Condensed',
			'Barriecito' => 'Barriecito',
			'Barrio' => 'Barrio',
			'Basic' => 'Basic',
			'Baskervville' => 'Baskervville',
			'Battambang' => 'Battambang',
			'Baumans' => 'Baumans',
			'Bayon' => 'Bayon',
			'Be Vietnam' => 'Be Vietnam',
			'Bebas Neue' => 'Bebas Neue',
			'Belgrano' => 'Belgrano',
			'Bellefair' => 'Bellefair',
			'Belleza' => 'Belleza',
			'Bellota' => 'Bellota',
			'Bellota Text' => 'Bellota Text',
			'BenchNine' => 'BenchNine',
			'Bentham' => 'Bentham',
			'Berkshire Swash' => 'Berkshire Swash',
			'Beth Ellen' => 'Beth Ellen',
			'Bevan' => 'Bevan',
			'Big Shoulders Display' => 'Big Shoulders Display',
			'Big Shoulders Inline Display' => 'Big Shoulders Inline Display',
			'Big Shoulders Inline Text' => 'Big Shoulders Inline Text',
			'Big Shoulders Stencil Display' => 'Big Shoulders Stencil Display',
			'Big Shoulders Stencil Text' => 'Big Shoulders Stencil Text',
			'Big Shoulders Text' => 'Big Shoulders Text',
			'Bigelow Rules' => 'Bigelow Rules',
			'Bigshot One' => 'Bigshot One',
			'Bilbo' => 'Bilbo',
			'Bilbo Swash Caps' => 'Bilbo Swash Caps',
			'BioRhyme' => 'BioRhyme',
			'BioRhyme Expanded' => 'BioRhyme Expanded',
			'Biryani' => 'Biryani',
			'Bitter' => 'Bitter',
			'Black And White Picture' => 'Black And White Picture',
			'Black Han Sans' => 'Black Han Sans',
			'Black Ops One' => 'Black Ops One',
			'Blinker' => 'Blinker',
			'Bodoni Moda' => 'Bodoni Moda',
			'Bokor' => 'Bokor',
			'Bonbon' => 'Bonbon',
			'Boogaloo' => 'Boogaloo',
			'Bowlby One' => 'Bowlby One',
			'Bowlby One SC' => 'Bowlby One SC',
			'Brawler' => 'Brawler',
			'Bree Serif' => 'Bree Serif',
			'Bubblegum Sans' => 'Bubblegum Sans',
			'Bubbler One' => 'Bubbler One',
			'Buda' => 'Buda',
			'Buenard' => 'Buenard',
			'Bungee' => 'Bungee',
			'Bungee Hairline' => 'Bungee Hairline',
			'Bungee Inline' => 'Bungee Inline',
			'Bungee Outline' => 'Bungee Outline',
			'Bungee Shade' => 'Bungee Shade',
			'Butcherman' => 'Butcherman',
			'Butterfly Kids' => 'Butterfly Kids',
			'Cabin' => 'Cabin',
			'Cabin Condensed' => 'Cabin Condensed',
			'Cabin Sketch' => 'Cabin Sketch',
			'Caesar Dressing' => 'Caesar Dressing',
			'Cagliostro' => 'Cagliostro',
			'Cairo' => 'Cairo',
			'Caladea' => 'Caladea',
			'Calistoga' => 'Calistoga',
			'Calligraffitti' => 'Calligraffitti',
			'Cambay' => 'Cambay',
			'Cambo' => 'Cambo',
			'Candal' => 'Candal',
			'Cantarell' => 'Cantarell',
			'Cantata One' => 'Cantata One',
			'Cantora One' => 'Cantora One',
			'Capriola' => 'Capriola',
			'Cardo' => 'Cardo',
			'Carme' => 'Carme',
			'Carrois Gothic' => 'Carrois Gothic',
			'Carrois Gothic SC' => 'Carrois Gothic SC',
			'Carter One' => 'Carter One',
			'Castoro' => 'Castoro',
			'Catamaran' => 'Catamaran',
			'Caudex' => 'Caudex',
			'Caveat' => 'Caveat',
			'Caveat Brush' => 'Caveat Brush',
			'Cedarville Cursive' => 'Cedarville Cursive',
			'Ceviche One' => 'Ceviche One',
			'Chakra Petch' => 'Chakra Petch',
			'Changa' => 'Changa',
			'Changa One' => 'Changa One',
			'Chango' => 'Chango',
			'Charm' => 'Charm',
			'Charmonman' => 'Charmonman',
			'Chathura' => 'Chathura',
			'Chau Philomene One' => 'Chau Philomene One',
			'Chela One' => 'Chela One',
			'Chelsea Market' => 'Chelsea Market',
			'Chenla' => 'Chenla',
			'Cherry Cream Soda' => 'Cherry Cream Soda',
			'Cherry Swash' => 'Cherry Swash',
			'Chewy' => 'Chewy',
			'Chicle' => 'Chicle',
			'Chilanka' => 'Chilanka',
			'Chivo' => 'Chivo',
			'Chonburi' => 'Chonburi',
			'Cinzel' => 'Cinzel',
			'Cinzel Decorative' => 'Cinzel Decorative',
			'Clicker Script' => 'Clicker Script',
			'Coda' => 'Coda',
			'Coda Caption' => 'Coda Caption',
			'Codystar' => 'Codystar',
			'Coiny' => 'Coiny',
			'Combo' => 'Combo',
			'Comfortaa' => 'Comfortaa',
			'Comic Neue' => 'Comic Neue',
			'Coming Soon' => 'Coming Soon',
			'Commissioner' => 'Commissioner',
			'Concert One' => 'Concert One',
			'Condiment' => 'Condiment',
			'Content' => 'Content',
			'Contrail One' => 'Contrail One',
			'Convergence' => 'Convergence',
			'Cookie' => 'Cookie',
			'Copse' => 'Copse',
			'Corben' => 'Corben',
			'Cormorant' => 'Cormorant',
			'Cormorant Garamond' => 'Cormorant Garamond',
			'Cormorant Infant' => 'Cormorant Infant',
			'Cormorant SC' => 'Cormorant SC',
			'Cormorant Unicase' => 'Cormorant Unicase',
			'Cormorant Upright' => 'Cormorant Upright',
			'Courgette' => 'Courgette',
			'Courier Prime' => 'Courier Prime',
			'Cousine' => 'Cousine',
			'Coustard' => 'Coustard',
			'Covered By Your Grace' => 'Covered By Your Grace',
			'Crafty Girls' => 'Crafty Girls',
			'Creepster' => 'Creepster',
			'Crete Round' => 'Crete Round',
			'Crimson Pro' => 'Crimson Pro',
			'Crimson Text' => 'Crimson Text',
			'Croissant One' => 'Croissant One',
			'Crushed' => 'Crushed',
			'Cuprum' => 'Cuprum',
			'Cute Font' => 'Cute Font',
			'Cutive' => 'Cutive',
			'Cutive Mono' => 'Cutive Mono',
			'DM Mono' => 'DM Mono',
			'DM Sans' => 'DM Sans',
			'DM Serif Display' => 'DM Serif Display',
			'DM Serif Text' => 'DM Serif Text',
			'Damion' => 'Damion',
			'Dancing Script' => 'Dancing Script',
			'Dangrek' => 'Dangrek',
			'Darker Grotesque' => 'Darker Grotesque',
			'David Libre' => 'David Libre',
			'Dawning of a New Day' => 'Dawning of a New Day',
			'Days One' => 'Days One',
			'Dekko' => 'Dekko',
			'Delius' => 'Delius',
			'Delius Swash Caps' => 'Delius Swash Caps',
			'Delius Unicase' => 'Delius Unicase',
			'Della Respira' => 'Della Respira',
			'Denk One' => 'Denk One',
			'Devonshire' => 'Devonshire',
			'Dhurjati' => 'Dhurjati',
			'Didact Gothic' => 'Didact Gothic',
			'Diplomata' => 'Diplomata',
			'Diplomata SC' => 'Diplomata SC',
			'Do Hyeon' => 'Do Hyeon',
			'Dokdo' => 'Dokdo',
			'Domine' => 'Domine',
			'Donegal One' => 'Donegal One',
			'Doppio One' => 'Doppio One',
			'Dorsa' => 'Dorsa',
			'Dosis' => 'Dosis',
			'Dr Sugiyama' => 'Dr Sugiyama',
			'Duru Sans' => 'Duru Sans',
			'Dynalight' => 'Dynalight',
			'EB Garamond' => 'EB Garamond',
			'Eagle Lake' => 'Eagle Lake',
			'East Sea Dokdo' => 'East Sea Dokdo',
			'Eater' => 'Eater',
			'Economica' => 'Economica',
			'Eczar' => 'Eczar',
			'El Messiri' => 'El Messiri',
			'Electrolize' => 'Electrolize',
			'Elsie' => 'Elsie',
			'Elsie Swash Caps' => 'Elsie Swash Caps',
			'Emblema One' => 'Emblema One',
			'Emilys Candy' => 'Emilys Candy',
			'Encode Sans' => 'Encode Sans',
			'Encode Sans Condensed' => 'Encode Sans Condensed',
			'Encode Sans Expanded' => 'Encode Sans Expanded',
			'Encode Sans Semi Condensed' => 'Encode Sans Semi Condensed',
			'Encode Sans Semi Expanded' => 'Encode Sans Semi Expanded',
			'Engagement' => 'Engagement',
			'Englebert' => 'Englebert',
			'Enriqueta' => 'Enriqueta',
			'Epilogue' => 'Epilogue',
			'Erica One' => 'Erica One',
			'Esteban' => 'Esteban',
			'Euphoria Script' => 'Euphoria Script',
			'Ewert' => 'Ewert',
			'Exo' => 'Exo',
			'Exo 2' => 'Exo 2',
			'Expletus Sans' => 'Expletus Sans',
			'Fahkwang' => 'Fahkwang',
			'Fanwood Text' => 'Fanwood Text',
			'Farro' => 'Farro',
			'Farsan' => 'Farsan',
			'Fascinate' => 'Fascinate',
			'Fascinate Inline' => 'Fascinate Inline',
			'Faster One' => 'Faster One',
			'Fasthand' => 'Fasthand',
			'Fauna One' => 'Fauna One',
			'Faustina' => 'Faustina',
			'Federant' => 'Federant',
			'Federo' => 'Federo',
			'Felipa' => 'Felipa',
			'Fenix' => 'Fenix',
			'Finger Paint' => 'Finger Paint',
			'Fira Code' => 'Fira Code',
			'Fira Mono' => 'Fira Mono',
			'Fira Sans' => 'Fira Sans',
			'Fira Sans Condensed' => 'Fira Sans Condensed',
			'Fira Sans Extra Condensed' => 'Fira Sans Extra Condensed',
			'Fjalla One' => 'Fjalla One',
			'Fjord One' => 'Fjord One',
			'Flamenco' => 'Flamenco',
			'Flavors' => 'Flavors',
			'Fondamento' => 'Fondamento',
			'Fontdiner Swanky' => 'Fontdiner Swanky',
			'Forum' => 'Forum',
			'Francois One' => 'Francois One',
			'Frank Ruhl Libre' => 'Frank Ruhl Libre',
			'Fraunces' => 'Fraunces',
			'Freckle Face' => 'Freckle Face',
			'Fredericka the Great' => 'Fredericka the Great',
			'Fredoka One' => 'Fredoka One',
			'Freehand' => 'Freehand',
			'Fresca' => 'Fresca',
			'Frijole' => 'Frijole',
			'Fruktur' => 'Fruktur',
			'Fugaz One' => 'Fugaz One',
			'GFS Didot' => 'GFS Didot',
			'GFS Neohellenic' => 'GFS Neohellenic',
			'Gabriela' => 'Gabriela',
			'Gaegu' => 'Gaegu',
			'Gafata' => 'Gafata',
			'Galada' => 'Galada',
			'Galdeano' => 'Galdeano',
			'Galindo' => 'Galindo',
			'Gamja Flower' => 'Gamja Flower',
			'Gayathri' => 'Gayathri',
			'Gelasio' => 'Gelasio',
			'Gentium Basic' => 'Gentium Basic',
			'Gentium Book Basic' => 'Gentium Book Basic',
			'Geo' => 'Geo',
			'Geostar' => 'Geostar',
			'Geostar Fill' => 'Geostar Fill',
			'Germania One' => 'Germania One',
			'Gidugu' => 'Gidugu',
			'Gilda Display' => 'Gilda Display',
			'Girassol' => 'Girassol',
			'Give You Glory' => 'Give You Glory',
			'Glass Antiqua' => 'Glass Antiqua',
			'Glegoo' => 'Glegoo',
			'Gloria Hallelujah' => 'Gloria Hallelujah',
			'Goblin One' => 'Goblin One',
			'Gochi Hand' => 'Gochi Hand',
			'Goldman' => 'Goldman',
			'Gorditas' => 'Gorditas',
			'Gothic A1' => 'Gothic A1',
			'Gotu' => 'Gotu',
			'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
			'Graduate' => 'Graduate',
			'Grand Hotel' => 'Grand Hotel',
			'Grandstander' => 'Grandstander',
			'Gravitas One' => 'Gravitas One',
			'Great Vibes' => 'Great Vibes',
			'Grenze' => 'Grenze',
			'Grenze Gotisch' => 'Grenze Gotisch',
			'Griffy' => 'Griffy',
			'Gruppo' => 'Gruppo',
			'Gudea' => 'Gudea',
			'Gugi' => 'Gugi',
			'Gupter' => 'Gupter',
			'Gurajada' => 'Gurajada',
			'Habibi' => 'Habibi',
			'Hachi Maru Pop' => 'Hachi Maru Pop',
			'Halant' => 'Halant',
			'Hammersmith One' => 'Hammersmith One',
			'Hanalei' => 'Hanalei',
			'Hanalei Fill' => 'Hanalei Fill',
			'Handlee' => 'Handlee',
			'Hanuman' => 'Hanuman',
			'Happy Monkey' => 'Happy Monkey',
			'Harmattan' => 'Harmattan',
			'Headland One' => 'Headland One',
			'Heebo' => 'Heebo',
			'Henny Penny' => 'Henny Penny',
			'Hepta Slab' => 'Hepta Slab',
			'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
			'Hi Melody' => 'Hi Melody',
			'Hind' => 'Hind',
			'Hind Guntur' => 'Hind Guntur',
			'Hind Madurai' => 'Hind Madurai',
			'Hind Siliguri' => 'Hind Siliguri',
			'Hind Vadodara' => 'Hind Vadodara',
			'Holtwood One SC' => 'Holtwood One SC',
			'Homemade Apple' => 'Homemade Apple',
			'Homenaje' => 'Homenaje',
			'IBM Plex Mono' => 'IBM Plex Mono',
			'IBM Plex Sans' => 'IBM Plex Sans',
			'IBM Plex Sans Condensed' => 'IBM Plex Sans Condensed',
			'IBM Plex Serif' => 'IBM Plex Serif',
			'IM Fell DW Pica' => 'IM Fell DW Pica',
			'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
			'IM Fell Double Pica' => 'IM Fell Double Pica',
			'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
			'IM Fell English' => 'IM Fell English',
			'IM Fell English SC' => 'IM Fell English SC',
			'IM Fell French Canon' => 'IM Fell French Canon',
			'IM Fell French Canon SC' => 'IM Fell French Canon SC',
			'IM Fell Great Primer' => 'IM Fell Great Primer',
			'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
			'Ibarra Real Nova' => 'Ibarra Real Nova',
			'Iceberg' => 'Iceberg',
			'Iceland' => 'Iceland',
			'Imbue' => 'Imbue',
			'Imprima' => 'Imprima',
			'Inconsolata' => 'Inconsolata',
			'Inder' => 'Inder',
			'Indie Flower' => 'Indie Flower',
			'Inika' => 'Inika',
			'Inknut Antiqua' => 'Inknut Antiqua',
			'Inria Sans' => 'Inria Sans',
			'Inria Serif' => 'Inria Serif',
			'Inter' => 'Inter',
			'Irish Grover' => 'Irish Grover',
			'Istok Web' => 'Istok Web',
			'Italiana' => 'Italiana',
			'Italianno' => 'Italianno',
			'Itim' => 'Itim',
			'Jacques Francois' => 'Jacques Francois',
			'Jacques Francois Shadow' => 'Jacques Francois Shadow',
			'Jaldi' => 'Jaldi',
			'JetBrains Mono' => 'JetBrains Mono',
			'Jim Nightshade' => 'Jim Nightshade',
			'Jockey One' => 'Jockey One',
			'Jolly Lodger' => 'Jolly Lodger',
			'Jomhuria' => 'Jomhuria',
			'Jomolhari' => 'Jomolhari',
			'Josefin Sans' => 'Josefin Sans',
			'Josefin Slab' => 'Josefin Slab',
			'Jost' => 'Jost',
			'Joti One' => 'Joti One',
			'Jua' => 'Jua',
			'Judson' => 'Judson',
			'Julee' => 'Julee',
			'Julius Sans One' => 'Julius Sans One',
			'Junge' => 'Junge',
			'Jura' => 'Jura',
			'Just Another Hand' => 'Just Another Hand',
			'Just Me Again Down Here' => 'Just Me Again Down Here',
			'K2D' => 'K2D',
			'Kadwa' => 'Kadwa',
			'Kalam' => 'Kalam',
			'Kameron' => 'Kameron',
			'Kanit' => 'Kanit',
			'Kantumruy' => 'Kantumruy',
			'Karla' => 'Karla',
			'Karma' => 'Karma',
			'Katibeh' => 'Katibeh',
			'Kaushan Script' => 'Kaushan Script',
			'Kavivanar' => 'Kavivanar',
			'Kavoon' => 'Kavoon',
			'Kdam Thmor' => 'Kdam Thmor',
			'Keania One' => 'Keania One',
			'Kelly Slab' => 'Kelly Slab',
			'Kenia' => 'Kenia',
			'Khand' => 'Khand',
			'Khmer' => 'Khmer',
			'Khula' => 'Khula',
			'Kirang Haerang' => 'Kirang Haerang',
			'Kite One' => 'Kite One',
			'Knewave' => 'Knewave',
			'KoHo' => 'KoHo',
			'Kodchasan' => 'Kodchasan',
			'Kosugi' => 'Kosugi',
			'Kosugi Maru' => 'Kosugi Maru',
			'Kotta One' => 'Kotta One',
			'Koulen' => 'Koulen',
			'Kranky' => 'Kranky',
			'Kreon' => 'Kreon',
			'Kristi' => 'Kristi',
			'Krona One' => 'Krona One',
			'Krub' => 'Krub',
			'Kufam' => 'Kufam',
			'Kulim Park' => 'Kulim Park',
			'Kumar One' => 'Kumar One',
			'Kumar One Outline' => 'Kumar One Outline',
			'Kumbh Sans' => 'Kumbh Sans',
			'Kurale' => 'Kurale',
			'La Belle Aurore' => 'La Belle Aurore',
			'Lacquer' => 'Lacquer',
			'Laila' => 'Laila',
			'Lakki Reddy' => 'Lakki Reddy',
			'Lalezar' => 'Lalezar',
			'Lancelot' => 'Lancelot',
			'Langar' => 'Langar',
			'Lateef' => 'Lateef',
			'Lato' => 'Lato',
			'League Script' => 'League Script',
			'Leckerli One' => 'Leckerli One',
			'Ledger' => 'Ledger',
			'Lekton' => 'Lekton',
			'Lemon' => 'Lemon',
			'Lemonada' => 'Lemonada',
			'Lexend Deca' => 'Lexend Deca',
			'Lexend Exa' => 'Lexend Exa',
			'Lexend Giga' => 'Lexend Giga',
			'Lexend Mega' => 'Lexend Mega',
			'Lexend Peta' => 'Lexend Peta',
			'Lexend Tera' => 'Lexend Tera',
			'Lexend Zetta' => 'Lexend Zetta',
			'Libre Barcode 128' => 'Libre Barcode 128',
			'Libre Barcode 128 Text' => 'Libre Barcode 128 Text',
			'Libre Barcode 39' => 'Libre Barcode 39',
			'Libre Barcode 39 Extended' => 'Libre Barcode 39 Extended',
			'Libre Barcode 39 Extended Text' => 'Libre Barcode 39 Extended Text',
			'Libre Barcode 39 Text' => 'Libre Barcode 39 Text',
			'Libre Barcode EAN13 Text' => 'Libre Barcode EAN13 Text',
			'Libre Baskerville' => 'Libre Baskerville',
			'Libre Caslon Display' => 'Libre Caslon Display',
			'Libre Caslon Text' => 'Libre Caslon Text',
			'Libre Franklin' => 'Libre Franklin',
			'Life Savers' => 'Life Savers',
			'Lilita One' => 'Lilita One',
			'Lily Script One' => 'Lily Script One',
			'Limelight' => 'Limelight',
			'Linden Hill' => 'Linden Hill',
			'Literata' => 'Literata',
			'Liu Jian Mao Cao' => 'Liu Jian Mao Cao',
			'Livvic' => 'Livvic',
			'Lobster' => 'Lobster',
			'Lobster Two' => 'Lobster Two',
			'Londrina Outline' => 'Londrina Outline',
			'Londrina Shadow' => 'Londrina Shadow',
			'Londrina Sketch' => 'Londrina Sketch',
			'Londrina Solid' => 'Londrina Solid',
			'Long Cang' => 'Long Cang',
			'Lora' => 'Lora',
			'Love Ya Like A Sister' => 'Love Ya Like A Sister',
			'Loved by the King' => 'Loved by the King',
			'Lovers Quarrel' => 'Lovers Quarrel',
			'Luckiest Guy' => 'Luckiest Guy',
			'Lusitana' => 'Lusitana',
			'Lustria' => 'Lustria',
			'M PLUS 1p' => 'M PLUS 1p',
			'M PLUS Rounded 1c' => 'M PLUS Rounded 1c',
			'Ma Shan Zheng' => 'Ma Shan Zheng',
			'Macondo' => 'Macondo',
			'Macondo Swash Caps' => 'Macondo Swash Caps',
			'Mada' => 'Mada',
			'Magra' => 'Magra',
			'Maiden Orange' => 'Maiden Orange',
			'Maitree' => 'Maitree',
			'Major Mono Display' => 'Major Mono Display',
			'Mako' => 'Mako',
			'Mali' => 'Mali',
			'Mallanna' => 'Mallanna',
			'Mandali' => 'Mandali',
			'Manjari' => 'Manjari',
			'Manrope' => 'Manrope',
			'Mansalva' => 'Mansalva',
			'Manuale' => 'Manuale',
			'Marcellus' => 'Marcellus',
			'Marcellus SC' => 'Marcellus SC',
			'Marck Script' => 'Marck Script',
			'Margarine' => 'Margarine',
			'Markazi Text' => 'Markazi Text',
			'Marko One' => 'Marko One',
			'Marmelad' => 'Marmelad',
			'Martel' => 'Martel',
			'Martel Sans' => 'Martel Sans',
			'Marvel' => 'Marvel',
			'Mate' => 'Mate',
			'Mate SC' => 'Mate SC',
			'Maven Pro' => 'Maven Pro',
			'McLaren' => 'McLaren',
			'Meddon' => 'Meddon',
			'MedievalSharp' => 'MedievalSharp',
			'Medula One' => 'Medula One',
			'Meera Inimai' => 'Meera Inimai',
			'Megrim' => 'Megrim',
			'Meie Script' => 'Meie Script',
			'Merienda' => 'Merienda',
			'Merienda One' => 'Merienda One',
			'Merriweather' => 'Merriweather',
			'Merriweather Sans' => 'Merriweather Sans',
			'Metal' => 'Metal',
			'Metal Mania' => 'Metal Mania',
			'Metamorphous' => 'Metamorphous',
			'Metrophobic' => 'Metrophobic',
			'Michroma' => 'Michroma',
			'Milonga' => 'Milonga',
			'Miltonian' => 'Miltonian',
			'Miltonian Tattoo' => 'Miltonian Tattoo',
			'Mina' => 'Mina',
			'Miniver' => 'Miniver',
			'Miriam Libre' => 'Miriam Libre',
			'Mirza' => 'Mirza',
			'Miss Fajardose' => 'Miss Fajardose',
			'Mitr' => 'Mitr',
			'Modak' => 'Modak',
			'Modern Antiqua' => 'Modern Antiqua',
			'Mogra' => 'Mogra',
			'Molengo' => 'Molengo',
			'Molle' => 'Molle',
			'Monda' => 'Monda',
			'Monofett' => 'Monofett',
			'Monoton' => 'Monoton',
			'Monsieur La Doulaise' => 'Monsieur La Doulaise',
			'Montaga' => 'Montaga',
			'Montez' => 'Montez',
			'Montserrat' => 'Montserrat',
			'Montserrat Alternates' => 'Montserrat Alternates',
			'Montserrat Subrayada' => 'Montserrat Subrayada',
			'Moul' => 'Moul',
			'Moulpali' => 'Moulpali',
			'Mountains of Christmas' => 'Mountains of Christmas',
			'Mouse Memoirs' => 'Mouse Memoirs',
			'Mr Bedfort' => 'Mr Bedfort',
			'Mr Dafoe' => 'Mr Dafoe',
			'Mr De Haviland' => 'Mr De Haviland',
			'Mrs Saint Delafield' => 'Mrs Saint Delafield',
			'Mrs Sheppards' => 'Mrs Sheppards',
			'Mukta' => 'Mukta',
			'Mukta Mahee' => 'Mukta Mahee',
			'Mukta Malar' => 'Mukta Malar',
			'Mukta Vaani' => 'Mukta Vaani',
			'Mulish' => 'Mulish',
			'MuseoModerno' => 'MuseoModerno',
			'Mystery Quest' => 'Mystery Quest',
			'NTR' => 'NTR',
			'Nanum Brush Script' => 'Nanum Brush Script',
			'Nanum Gothic' => 'Nanum Gothic',
			'Nanum Gothic Coding' => 'Nanum Gothic Coding',
			'Nanum Myeongjo' => 'Nanum Myeongjo',
			'Nanum Pen Script' => 'Nanum Pen Script',
			'Nerko One' => 'Nerko One',
			'Neucha' => 'Neucha',
			'Neuton' => 'Neuton',
			'New Rocker' => 'New Rocker',
			'News Cycle' => 'News Cycle',
			'Niconne' => 'Niconne',
			'Niramit' => 'Niramit',
			'Nixie One' => 'Nixie One',
			'Nobile' => 'Nobile',
			'Nokora' => 'Nokora',
			'Norican' => 'Norican',
			'Nosifer' => 'Nosifer',
			'Notable' => 'Notable',
			'Nothing You Could Do' => 'Nothing You Could Do',
			'Noticia Text' => 'Noticia Text',
			'Noto Sans' => 'Noto Sans',
			'Noto Sans HK' => 'Noto Sans HK',
			'Noto Sans JP' => 'Noto Sans JP',
			'Noto Sans KR' => 'Noto Sans KR',
			'Noto Sans SC' => 'Noto Sans SC',
			'Noto Sans TC' => 'Noto Sans TC',
			'Noto Serif' => 'Noto Serif',
			'Noto Serif JP' => 'Noto Serif JP',
			'Noto Serif KR' => 'Noto Serif KR',
			'Noto Serif SC' => 'Noto Serif SC',
			'Noto Serif TC' => 'Noto Serif TC',
			'Nova Cut' => 'Nova Cut',
			'Nova Flat' => 'Nova Flat',
			'Nova Mono' => 'Nova Mono',
			'Nova Oval' => 'Nova Oval',
			'Nova Round' => 'Nova Round',
			'Nova Script' => 'Nova Script',
			'Nova Slim' => 'Nova Slim',
			'Nova Square' => 'Nova Square',
			'Numans' => 'Numans',
			'Nunito' => 'Nunito',
			'Nunito Sans' => 'Nunito Sans',
			'Odibee Sans' => 'Odibee Sans',
			'Odor Mean Chey' => 'Odor Mean Chey',
			'Offside' => 'Offside',
			'Old Standard TT' => 'Old Standard TT',
			'Oldenburg' => 'Oldenburg',
			'Oleo Script' => 'Oleo Script',
			'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
			'Open Sans' => 'Open Sans',
			'Open Sans Condensed' => 'Open Sans Condensed',
			'Oranienbaum' => 'Oranienbaum',
			'Orbitron' => 'Orbitron',
			'Oregano' => 'Oregano',
			'Orienta' => 'Orienta',
			'Original Surfer' => 'Original Surfer',
			'Oswald' => 'Oswald',
			'Over the Rainbow' => 'Over the Rainbow',
			'Overlock' => 'Overlock',
			'Overlock SC' => 'Overlock SC',
			'Overpass' => 'Overpass',
			'Overpass Mono' => 'Overpass Mono',
			'Ovo' => 'Ovo',
			'Oxanium' => 'Oxanium',
			'Oxygen' => 'Oxygen',
			'Oxygen Mono' => 'Oxygen Mono',
			'PT Mono' => 'PT Mono',
			'PT Sans' => 'PT Sans',
			'PT Sans Caption' => 'PT Sans Caption',
			'PT Sans Narrow' => 'PT Sans Narrow',
			'PT Serif' => 'PT Serif',
			'PT Serif Caption' => 'PT Serif Caption',
			'Pacifico' => 'Pacifico',
			'Padauk' => 'Padauk',
			'Palanquin' => 'Palanquin',
			'Palanquin Dark' => 'Palanquin Dark',
			'Pangolin' => 'Pangolin',
			'Paprika' => 'Paprika',
			'Parisienne' => 'Parisienne',
			'Passero One' => 'Passero One',
			'Passion One' => 'Passion One',
			'Pathway Gothic One' => 'Pathway Gothic One',
			'Patrick Hand' => 'Patrick Hand',
			'Patrick Hand SC' => 'Patrick Hand SC',
			'Pattaya' => 'Pattaya',
			'Patua One' => 'Patua One',
			'Pavanam' => 'Pavanam',
			'Paytone One' => 'Paytone One',
			'Peddana' => 'Peddana',
			'Peralta' => 'Peralta',
			'Permanent Marker' => 'Permanent Marker',
			'Petit Formal Script' => 'Petit Formal Script',
			'Petrona' => 'Petrona',
			'Philosopher' => 'Philosopher',
			'Piazzolla' => 'Piazzolla',
			'Piedra' => 'Piedra',
			'Pinyon Script' => 'Pinyon Script',
			'Pirata One' => 'Pirata One',
			'Plaster' => 'Plaster',
			'Play' => 'Play',
			'Playball' => 'Playball',
			'Playfair Display' => 'Playfair Display',
			'Playfair Display SC' => 'Playfair Display SC',
			'Podkova' => 'Podkova',
			'Poiret One' => 'Poiret One',
			'Poller One' => 'Poller One',
			'Poly' => 'Poly',
			'Pompiere' => 'Pompiere',
			'Pontano Sans' => 'Pontano Sans',
			'Poor Story' => 'Poor Story',
			'Poppins' => 'Poppins',
			'Port Lligat Sans' => 'Port Lligat Sans',
			'Port Lligat Slab' => 'Port Lligat Slab',
			'Potta One' => 'Potta One',
			'Pragati Narrow' => 'Pragati Narrow',
			'Prata' => 'Prata',
			'Preahvihear' => 'Preahvihear',
			'Press Start 2P' => 'Press Start 2P',
			'Pridi' => 'Pridi',
			'Princess Sofia' => 'Princess Sofia',
			'Prociono' => 'Prociono',
			'Prompt' => 'Prompt',
			'Prosto One' => 'Prosto One',
			'Proza Libre' => 'Proza Libre',
			'Public Sans' => 'Public Sans',
			'Puritan' => 'Puritan',
			'Purple Purse' => 'Purple Purse',
			'Quando' => 'Quando',
			'Quantico' => 'Quantico',
			'Quattrocento' => 'Quattrocento',
			'Quattrocento Sans' => 'Quattrocento Sans',
			'Questrial' => 'Questrial',
			'Quicksand' => 'Quicksand',
			'Quintessential' => 'Quintessential',
			'Qwigley' => 'Qwigley',
			'Racing Sans One' => 'Racing Sans One',
			'Radley' => 'Radley',
			'Rajdhani' => 'Rajdhani',
			'Rakkas' => 'Rakkas',
			'Raleway' => 'Raleway',
			'Raleway Dots' => 'Raleway Dots',
			'Ramabhadra' => 'Ramabhadra',
			'Ramaraja' => 'Ramaraja',
			'Rambla' => 'Rambla',
			'Rammetto One' => 'Rammetto One',
			'Ranchers' => 'Ranchers',
			'Rancho' => 'Rancho',
			'Ranga' => 'Ranga',
			'Rasa' => 'Rasa',
			'Rationale' => 'Rationale',
			'Ravi Prakash' => 'Ravi Prakash',
			'Recursive' => 'Recursive',
			'Red Hat Display' => 'Red Hat Display',
			'Red Hat Text' => 'Red Hat Text',
			'Red Rose' => 'Red Rose',
			'Redressed' => 'Redressed',
			'Reem Kufi' => 'Reem Kufi',
			'Reenie Beanie' => 'Reenie Beanie',
			'Revalia' => 'Revalia',
			'Rhodium Libre' => 'Rhodium Libre',
			'Ribeye' => 'Ribeye',
			'Ribeye Marrow' => 'Ribeye Marrow',
			'Righteous' => 'Righteous',
			'Risque' => 'Risque',
			'Roboto' => 'Roboto',
			'Roboto Condensed' => 'Roboto Condensed',
			'Roboto Mono' => 'Roboto Mono',
			'Roboto Slab' => 'Roboto Slab',
			'Rochester' => 'Rochester',
			'Rock Salt' => 'Rock Salt',
			'Rokkitt' => 'Rokkitt',
			'Romanesco' => 'Romanesco',
			'Ropa Sans' => 'Ropa Sans',
			'Rosario' => 'Rosario',
			'Rosarivo' => 'Rosarivo',
			'Rouge Script' => 'Rouge Script',
			'Rowdies' => 'Rowdies',
			'Rozha One' => 'Rozha One',
			'Rubik' => 'Rubik',
			'Rubik Mono One' => 'Rubik Mono One',
			'Ruda' => 'Ruda',
			'Rufina' => 'Rufina',
			'Ruge Boogie' => 'Ruge Boogie',
			'Ruluko' => 'Ruluko',
			'Rum Raisin' => 'Rum Raisin',
			'Ruslan Display' => 'Ruslan Display',
			'Russo One' => 'Russo One',
			'Ruthie' => 'Ruthie',
			'Rye' => 'Rye',
			'Sacramento' => 'Sacramento',
			'Sahitya' => 'Sahitya',
			'Sail' => 'Sail',
			'Saira' => 'Saira',
			'Saira Condensed' => 'Saira Condensed',
			'Saira Extra Condensed' => 'Saira Extra Condensed',
			'Saira Semi Condensed' => 'Saira Semi Condensed',
			'Saira Stencil One' => 'Saira Stencil One',
			'Salsa' => 'Salsa',
			'Sanchez' => 'Sanchez',
			'Sancreek' => 'Sancreek',
			'Sansita' => 'Sansita',
			'Sansita Swashed' => 'Sansita Swashed',
			'Sarabun' => 'Sarabun',
			'Sarala' => 'Sarala',
			'Sarina' => 'Sarina',
			'Sarpanch' => 'Sarpanch',
			'Satisfy' => 'Satisfy',
			'Sawarabi Gothic' => 'Sawarabi Gothic',
			'Sawarabi Mincho' => 'Sawarabi Mincho',
			'Scada' => 'Scada',
			'Scheherazade' => 'Scheherazade',
			'Schoolbell' => 'Schoolbell',
			'Scope One' => 'Scope One',
			'Seaweed Script' => 'Seaweed Script',
			'Secular One' => 'Secular One',
			'Sedgwick Ave' => 'Sedgwick Ave',
			'Sedgwick Ave Display' => 'Sedgwick Ave Display',
			'Sen' => 'Sen',
			'Sevillana' => 'Sevillana',
			'Seymour One' => 'Seymour One',
			'Shadows Into Light' => 'Shadows Into Light',
			'Shadows Into Light Two' => 'Shadows Into Light Two',
			'Shanti' => 'Shanti',
			'Share' => 'Share',
			'Share Tech' => 'Share Tech',
			'Share Tech Mono' => 'Share Tech Mono',
			'Shojumaru' => 'Shojumaru',
			'Short Stack' => 'Short Stack',
			'Shrikhand' => 'Shrikhand',
			'Siemreap' => 'Siemreap',
			'Sigmar One' => 'Sigmar One',
			'Signika' => 'Signika',
			'Signika Negative' => 'Signika Negative',
			'Simonetta' => 'Simonetta',
			'Single Day' => 'Single Day',
			'Sintony' => 'Sintony',
			'Sirin Stencil' => 'Sirin Stencil',
			'Six Caps' => 'Six Caps',
			'Skranji' => 'Skranji',
			'Slabo 13px' => 'Slabo 13px',
			'Slabo 27px' => 'Slabo 27px',
			'Slackey' => 'Slackey',
			'Smokum' => 'Smokum',
			'Smythe' => 'Smythe',
			'Sniglet' => 'Sniglet',
			'Snippet' => 'Snippet',
			'Snowburst One' => 'Snowburst One',
			'Sofadi One' => 'Sofadi One',
			'Sofia' => 'Sofia',
			'Solway' => 'Solway',
			'Song Myung' => 'Song Myung',
			'Sonsie One' => 'Sonsie One',
			'Sora' => 'Sora',
			'Sorts Mill Goudy' => 'Sorts Mill Goudy',
			'Source Code Pro' => 'Source Code Pro',
			'Source Sans Pro' => 'Source Sans Pro',
			'Source Serif Pro' => 'Source Serif Pro',
			'Space Grotesk' => 'Space Grotesk',
			'Space Mono' => 'Space Mono',
			'Spartan' => 'Spartan',
			'Special Elite' => 'Special Elite',
			'Spectral' => 'Spectral',
			'Spectral SC' => 'Spectral SC',
			'Spicy Rice' => 'Spicy Rice',
			'Spinnaker' => 'Spinnaker',
			'Spirax' => 'Spirax',
			'Squada One' => 'Squada One',
			'Sree Krushnadevaraya' => 'Sree Krushnadevaraya',
			'Sriracha' => 'Sriracha',
			'Srisakdi' => 'Srisakdi',
			'Staatliches' => 'Staatliches',
			'Stalemate' => 'Stalemate',
			'Stalinist One' => 'Stalinist One',
			'Stardos Stencil' => 'Stardos Stencil',
			'Stint Ultra Condensed' => 'Stint Ultra Condensed',
			'Stint Ultra Expanded' => 'Stint Ultra Expanded',
			'Stoke' => 'Stoke',
			'Strait' => 'Strait',
			'Stylish' => 'Stylish',
			'Sue Ellen Francisco' => 'Sue Ellen Francisco',
			'Suez One' => 'Suez One',
			'Sulphur Point' => 'Sulphur Point',
			'Sumana' => 'Sumana',
			'Sunflower' => 'Sunflower',
			'Sunshiney' => 'Sunshiney',
			'Supermercado One' => 'Supermercado One',
			'Sura' => 'Sura',
			'Suranna' => 'Suranna',
			'Suravaram' => 'Suravaram',
			'Suwannaphum' => 'Suwannaphum',
			'Swanky and Moo Moo' => 'Swanky and Moo Moo',
			'Syncopate' => 'Syncopate',
			'Syne' => 'Syne',
			'Syne Mono' => 'Syne Mono',
			'Syne Tactile' => 'Syne Tactile',
			'Tajawal' => 'Tajawal',
			'Tangerine' => 'Tangerine',
			'Taprom' => 'Taprom',
			'Tauri' => 'Tauri',
			'Taviraj' => 'Taviraj',
			'Teko' => 'Teko',
			'Telex' => 'Telex',
			'Tenali Ramakrishna' => 'Tenali Ramakrishna',
			'Tenor Sans' => 'Tenor Sans',
			'Text Me One' => 'Text Me One',
			'Texturina' => 'Texturina',
			'Thasadith' => 'Thasadith',
			'The Girl Next Door' => 'The Girl Next Door',
			'Tienne' => 'Tienne',
			'Tillana' => 'Tillana',
			'Timmana' => 'Timmana',
			'Tinos' => 'Tinos',
			'Titan One' => 'Titan One',
			'Titillium Web' => 'Titillium Web',
			'Tomorrow' => 'Tomorrow',
			'Trade Winds' => 'Trade Winds',
			'Trirong' => 'Trirong',
			'Trispace' => 'Trispace',
			'Trocchi' => 'Trocchi',
			'Trochut' => 'Trochut',
			'Trykker' => 'Trykker',
			'Tulpen One' => 'Tulpen One',
			'Turret Road' => 'Turret Road',
			'Ubuntu' => 'Ubuntu',
			'Ubuntu Condensed' => 'Ubuntu Condensed',
			'Ubuntu Mono' => 'Ubuntu Mono',
			'Ultra' => 'Ultra',
			'Uncial Antiqua' => 'Uncial Antiqua',
			'Underdog' => 'Underdog',
			'Unica One' => 'Unica One',
			'UnifrakturCook' => 'UnifrakturCook',
			'UnifrakturMaguntia' => 'UnifrakturMaguntia',
			'Unkempt' => 'Unkempt',
			'Unlock' => 'Unlock',
			'Unna' => 'Unna',
			'VT323' => 'VT323',
			'Vampiro One' => 'Vampiro One',
			'Varela' => 'Varela',
			'Varela Round' => 'Varela Round',
			'Varta' => 'Varta',
			'Vast Shadow' => 'Vast Shadow',
			'Vesper Libre' => 'Vesper Libre',
			'Viaoda Libre' => 'Viaoda Libre',
			'Vibes' => 'Vibes',
			'Vibur' => 'Vibur',
			'Vidaloka' => 'Vidaloka',
			'Viga' => 'Viga',
			'Voces' => 'Voces',
			'Volkhov' => 'Volkhov',
			'Vollkorn' => 'Vollkorn',
			'Vollkorn SC' => 'Vollkorn SC',
			'Voltaire' => 'Voltaire',
			'Waiting for the Sunrise' => 'Waiting for the Sunrise',
			'Wallpoet' => 'Wallpoet',
			'Walter Turncoat' => 'Walter Turncoat',
			'Warnes' => 'Warnes',
			'Wellfleet' => 'Wellfleet',
			'Wendy One' => 'Wendy One',
			'Wire One' => 'Wire One',
			'Work Sans' => 'Work Sans',
			'Xanh Mono' => 'Xanh Mono',
			'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
			'Yantramanav' => 'Yantramanav',
			'Yatra One' => 'Yatra One',
			'Yellowtail' => 'Yellowtail',
			'Yeon Sung' => 'Yeon Sung',
			'Yeseva One' => 'Yeseva One',
			'Yesteryear' => 'Yesteryear',
			'Yrsa' => 'Yrsa',
			'Yusei Magic' => 'Yusei Magic',
			'ZCOOL KuaiLe' => 'ZCOOL KuaiLe',
			'ZCOOL QingKe HuangYou' => 'ZCOOL QingKe HuangYou',
			'ZCOOL XiaoWei' => 'ZCOOL XiaoWei',
			'Zeyada' => 'Zeyada',
			'Zhi Mang Xing' => 'Zhi Mang Xing',
			'Zilla Slab' => 'Zilla Slab',
			'Zilla Slab Highlight' => 'Zilla Slab Highlight'

		);

		return $google_font_list;

	}

endif;


if(!function_exists( 'slain_hex2rgba' )):

	// HEX to RGBA Converter
	function slain_hex2rgba( $color, $opacity = 1 ) {

		$default = '';

		//Return default if no color provided
		if(empty($color)){
			return $default;
		}
		
		//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;

	}

endif;


/**
 * Function define about page/post/archive sidebar
 *
 * @since 1.0.0
 */
if( ! function_exists( 'slain_get_sidebar_name' ) ):

function slain_get_sidebar_name() {

    $default_sidebar = 'right_sidebar';
    $sidebar_name = $default_sidebar;
    if(is_home()){
        $sidebar_name = get_theme_mod( 'centurylib_default_index_sidebar', $default_sidebar );
    }
    if(is_archive()){
        $sidebar_name = get_theme_mod( 'centurylib_default_archive_sidebar', $default_sidebar );
    }
    if(is_search()){
        $sidebar_name = get_theme_mod( 'centurylib_default_search_sidebar', $default_sidebar );
    }
    if(is_404()){
        $sidebar_name = get_theme_mod( 'centurylib_default_notfound_sidebar', $default_sidebar );
    }

    if(is_page()){
        $sidebar_name = get_theme_mod( 'centurylib_default_page_sidebar', $default_sidebar );
    }

    if(is_single()){
        $sidebar_name = get_theme_mod( 'centurylib_default_post_sidebar', $default_sidebar );
    }


    // Metabox For page and posts
    if( is_page() || is_single() ){
        $metabox_sidebar_details = get_post_meta( get_the_ID(), 'centurylib_single_post_sidebar', true );
        $metabox_sidebar_name = (isset($metabox_sidebar_details['sidebar_layout'])) ? esc_attr($metabox_sidebar_details['sidebar_layout']) : '';

        $sidebar_name = ( $metabox_sidebar_name && $metabox_sidebar_name !='default_sidebar' ) ? $metabox_sidebar_name : $sidebar_name; 
    }

    return $sidebar_name;

}
endif;

/**
 * Function to get sidebar name in array
 *
 * @since 1.0.0
 */
if(!function_exists('slain_sidebar_name_arrray') ){

    function slain_sidebar_name_array(){
        $sidebar_name = slain_get_sidebar_name();
        $slain_sidebars = array();
        switch ($sidebar_name){
            case 'left_sidebar':
                $slain_sidebars[] = 'sidebar-left';
                break;
            case 'right_sidebar':
                $slain_sidebars[] = 'sidebar-right';
                break;
            case 'both_sidebar':
                $slain_sidebars[] = 'sidebar-left';
                $slain_sidebars[] = 'sidebar-right';
                break;
            case 'no_sidebar':
            case 'no_sidebar_center':
                $slain_sidebars = array();
                break;
            default:
                $slain_sidebars[] = 'sidebar-right';
                break;
        }

        return $slain_sidebars;
    }

}


/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Register Google fonts for slain.
 *
 * @return string Google fonts URL for the theme.
 * @since 1.0.0
 */
if ( ! function_exists( 'slain_fonts_url' ) ) :

    function slain_fonts_url() {
        
        $fonts_url = '';
        $font_families = array();

        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'slain' ) ) {
			$font_families[] = 'Open Sans:400,400i,600,600i,700,700i';
		}

		$fonts_data = get_theme_mod( 'slain_font_families', array() );

		if($fonts_data){
			foreach($fonts_data as $font_family ){
				$font_families[] = esc_attr($font_family).':400,400i,600,600i,700,700i';
			}
		}

        $font_families = apply_filters( 'slain_google_font_families', $font_families );

        if( $font_families ) {

            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                //'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

        }

        return $fonts_url;

    }

endif;

/*---------------------------------------------------------------------------------------------------------------*/
/**
 * Social media function
 *
 * @since 1.0.0
 */

if ( ! function_exists( 'slain_social_media' ) ):
	function slain_social_media( $class, $title ) {

		$get_social_media_icons  = get_theme_mod( 'social_media_icons', '' );
		$social_media_target  = get_theme_mod( 'social_media_target', '_blank' );
		if(!$get_social_media_icons){
			return;
		}
		$get_decode_social_media = json_decode( $get_social_media_icons );
		if ( ! empty( $get_decode_social_media ) ) {
			?>
			<div class="<?php echo esc_attr( $class ); ?>">
			<?php
				foreach ( $get_decode_social_media as $single_icon ) {
					$icon_class = $single_icon->icon_class;
					$icon_url   = $single_icon->icon_url;
					$icon_color   = $single_icon->icon_color;
					$icon_title   = $single_icon->icon_title;
					if ( ! empty( $icon_url ) ) {
						?>
						<a href="<?php echo esc_url( $icon_url ); ?>" target="<?php echo esc_attr($social_media_target); ?>">
							<span class="<?php echo esc_attr($class); ?>-icon" style="color:<?php echo esc_attr($icon_color); ?>">
								<i class="fa <?php echo esc_attr( $icon_class ); ?>"></i>
							</span>
							<?php if ( $title ) : ?>
								<span><?php echo esc_html($icon_title); ?></span>
							<?php endif ;?>
						</a>
						<?php
					}
				}
			?>	
			</div>
			<?php
		}
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Category list
 *
 * @return array();
 */
if ( ! function_exists( 'slain_categories_lists' ) ):
	function slain_categories_lists() {
		$slain_categories       = get_categories( array( 'hide_empty' => 1 ) );
		$slain_categories_lists = array();
		foreach ( $slain_categories as $category ) {
			$slain_categories_lists[ $category->term_id ] = $category->name;
		}

		return $slain_categories_lists;
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Category dropdown
 *
 * @return array();
 */
if ( ! function_exists( 'slain_categories_dropdown' ) ):
	function slain_categories_dropdown() {
		$slain_categories            = get_categories( array( 'hide_empty' => 1 ) );
		$slain_categories_lists      = array();
		$slain_categories_lists['0'] = esc_html__( 'Select Category', 'slain' );
		foreach ( $slain_categories as $category ) {
			$slain_categories_lists[ $category->term_id ] = $category->name;
		}

		return $slain_categories_lists;
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Get minified css and removed space
 *
 * @since 1.0.0
 */
function slain_css_strip_whitespace( $css ) {
	$replace = array(
		"#/\*.*?\*/#s" => "",  // Strip C style comments.
		"#\s\s+#"      => " ", // Strip excess whitespace.
	);
	$search  = array_keys( $replace );
	$css     = preg_replace( $search, $replace, $css );

	$replace = array(
		": "  => ":",
		"; "  => ";",
		" {"  => "{",
		" }"  => "}",
		", "  => ",",
		"{ "  => "{",
		";}"  => "}", // Strip optional semicolons.
		",\n" => ",", // Don't wrap multiple selectors.
		"\n}" => "}", // Don't wrap closing braces.
		"} "  => "}\n", // Put each rule on it's own line.
	);
	$search  = array_keys( $replace );
	$css     = str_replace( $search, $replace, $css );

	return trim( $css );
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Generate darker color
 * Source: http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'slain_hover_color' ) ) :
	
	function slain_hover_color( $hex, $steps ) {
		// Steps should be between -255 and 255. Negative = darker, positive = lighter
		$steps = max( - 255, min( 255, $steps ) );

		// Normalize into a six character long hex string
		$hex = str_replace( '#', '', $hex );
		if ( strlen( $hex ) == 3 ) {
			$hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
		}

		// Split into three parts: R, G and B
		$color_parts = str_split( $hex, 2 );
		$return      = '#';

		foreach ( $color_parts as $color ) {
			$color = hexdec( $color ); // Convert to decimal
			$color = max( 0, min( 255, $color + $steps ) ); // Adjust color
			$return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code
		}

		return $return;
	}
endif;


if( !function_exists( 'slain_get_post') ):

	function slain_get_post( $args = array() ){
		$default_args = array(
			'post_type' => 'page',
			'post_status' => 'publish',
			'sort_column' => 'post_title',
			'posts_per_page' => -1,
			'orderby' => 'date',
			'order' => 'ASC',
		);
		$post_type_args = wp_parse_args( $args, $default_args );
		$post_list = get_posts( $post_type_args );
		$post_list = wp_list_pluck( $post_list, 'post_title', 'ID' );
		return $post_list;

	}

endif;


if(!function_exists( 'slain_top_menu_fallback' )):

	/*
	**  Top Menu Fallback
	*/
	function slain_top_menu_fallback() {

		if ( current_user_can( 'edit_theme_options' ) ) {
			echo '<ul id="top-menu">';
				echo '<li>';
					echo '<a href="'. esc_url( admin_url('nav-menus.php') ) .'">'. esc_html__( 'Setup Menu', 'slain' ) .'</a>';
				echo '</li>';
			echo '</ul>';
		}

	}

endif;


if(!function_exists( 'slain_main_menu_fallback' )):

	/*
	**  Main Menu Fallback
	*/
	function slain_main_menu_fallback() {

			if ( current_user_can( 'edit_theme_options' ) ) {

				$show_menu_sidebar = get_theme_mod( 'slain_main_nav_show_sidebar', 0 );
				$show_random_icon = get_theme_mod( 'slain_main_nav_random_icon', 0 );
				$enable_search_icon = get_theme_mod( 'slain_main_nav_search_icon', 0 );

				$main_menu_class = ($show_menu_sidebar) ? ' has-left-icon ' : ' no-left-icon ';
				$main_menu_class .= ( $show_random_icon || $enable_search_icon ) ? ' has-right-icon ' : ' no-right-icon ';

				echo '<ul id="main-menu" class="'.esc_attr($main_menu_class).'">';
					echo '<li>';
						echo '<a href="'. esc_url( home_url('/') .'wp-admin/nav-menus.php' ) .'">'. esc_html__( 'Setup Menu', 'slain' ) .'</a>';
					echo '</li>';
				echo '</ul>';
			}
	}

endif;

if ( ! function_exists( 'slain_random_post_button' ) ) {
	
	function slain_random_post_button() {

		$args = array(
			'post_type'				=> 'post',
			'orderby' 				=> 'rand',
			'posts_per_page'		=> 1,
    		'ignore_sticky_posts' 	=> 1
		);
		$random_post = new WP_Query( $args );

		while ( $random_post->have_posts() ) : $random_post->the_post(); ?>

		<a class="random-post-btn" href="<?php the_permalink(); ?>">
			<span class="btn-tooltip"><?php esc_html_e( 'Random Article', 'slain' ); ?></span>
			<i class="fa fa-random"></i>
		</a>

		<?php

		endwhile;

		wp_reset_postdata();

	}
}


if(!function_exists( 'slain_the_categories' )):

	function slain_the_categories( $post_id = '' ){

		if(!$post_id){
			$post_id = get_the_ID();
		}

		$categories = get_the_category( $post_id );
		foreach( $categories as $index=>$single_category ){
			if($index){
				echo ', ';
			}
			?><a class="cat-<?php echo esc_attr($single_category->slug); ?>" href="<?php echo esc_url(get_category_link($single_category)); ?>" title="<?php echo esc_attr($single_category->name); ?>"><?php echo esc_html($single_category->name); ?></a><?php
		}

	}

endif;


if(!function_exists( 'slain_comments')):

	function slain_comments( $comment, $args, $depth ){

		$_GLOBAL['comment'] = $comment;

		if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ) : ?>
			
		<li class="pingback" id="comment-<?php comment_ID(); ?>">
			<article <?php comment_class('entry-comments'); ?> >
				<div class="comment-content">
					<h6 class="comment-author"><?php esc_html_e( 'Pingback:', 'slain' ); ?></h6>	
					<div class="comment-meta">		
						<a class="comment-date" href=" <?php echo esc_url( get_comment_link() ); ?> "><?php comment_date( get_option('date_format') ); esc_html_e( '&nbsp;at&nbsp;', 'slain' ); comment_time( get_option('time_format') ); ?></a>
						<?php echo edit_comment_link( esc_html__('[Edit]', 'slain' ) ); ?>
						<div class="clear-fix"></div>
					</div>
					<div class="comment-text">			
					<?php comment_author_link(); ?>
					</div>
				</div>
			</article>

		<?php elseif ( get_comment_type() == 'comment' ) : ?>

		<li id="comment-<?php comment_ID(); ?>">
			
			<article <?php comment_class( 'entry-comments' ); ?> >					
				<div class="comment-avatar">
					<?php echo get_avatar( $comment, 65 ); ?>
				</div>
				<div class="comment-content">
					<h6 class="comment-author"><?php comment_author_link(); ?></h6>
					<div class="comment-meta">		
						<a class="comment-date" href=" <?php echo esc_url( get_comment_link() ); ?> "><?php comment_date( get_option('date_format') ); esc_html_e( '&nbsp;at&nbsp;', 'slain' ); comment_time( get_option('time_format') ); ?></a>
			
						<?php 
						echo edit_comment_link( esc_html__('[Edit]', 'slain' ) );
						comment_reply_link(array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']) ) );
						?>
						
						<div class="clear-fix"></div>
					</div>

					<div class="comment-text">
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'slain' ); ?></p>
						<?php endif; ?>
						<?php comment_text(); ?>
					</div>
				</div>
				
			</article>

		<?php endif;
	}

endif;