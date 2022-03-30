<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                "title" => "Adana",
                "districts" => ["Aladağ", "Ceyhan", "Çukurova", "Feke", "İmamoğlu", "Karaisalı", "Karataş", "Kozan", "Pozantı", "Saimbeyli", "Sarıçam", "Seyhan", "Tufanbeyli", "Yumurtalık", "Yüreğir"]
            ],
            [
                'id' => 2,
                "title" => "Adıyaman",
                "districts" => ["Adıyaman", "Besni", "Çelikhan", "Gerger", "Gölbaşı", "Kâhta", "Samsat", "Sincik", "Tut"]
            ],
            [
                'id' => 3,
                "title" => "Afyonkarahisar",
                "districts" => ["Afyonkarahisar", "Başmakçı", "Bayat", "Bolvadin", "Çay", "Çobanlar", "Dazkırı", "Dinar", "Emirdağ", "Evciler", "Hocalar", "İhsaniye", "İscehisar", "Kızılören", "Sandıklı", "Sinanpaşa", "Sultandağı", "Şuhut"]
            ],
            [
                'id' => 4,
                "title" => "Ağrı",
                "districts" => ["Ağrı", "Diyadin", "Doğubayazıt", "Eleşkirt", "Hamur", "Patnos", "Taşlıçay", "Tutak"]
            ],
            [
                'id' => 68,
                "title" => "Aksaray",
                "districts" => ["Ağaçören", "Aksaray", "Eskil", "Gülağaç", "Güzelyurt", "Ortaköy", "Sarıyahşi"]
            ],
            [
                'id' => 5,
                "title" => "Amasya",
                "districts" => ["Amasya", "Göynücek", "Gümüşhacıköy", "Hamamözü", "Merzifon", "Suluova", "Taşova"]
            ],
            [
                'id' => 6,
                "title" => "Ankara",
                "districts" => ["Akyurt", "Altındağ", "Ayaş", "Balâ", "Beypazarı", "Çamlıdere", "Çankaya", "Çubuk", "Elmadağ", "Etimesgut", "Evren", "Gölbaşı", "Güdül", "Haymana", "Kalecik", "Kahramankazan", "Keçiören", "Kızılcahamam", "Mamak", "Nallıhan", "Polatlı", "Pursaklar", "Sincan", "Şereflikoçhisar", "Yenimahalle"]
            ],
            [
                'id' => 7,
                "title" => "Antalya",
                "districts" => ["Akseki", "Aksu", "Alanya", "Döşemealtı", "Elmalı", "Finike", "Gazipaşa", "Gündoğmuş", "İbradı", "Demre", "Kaş", "Kemer", "Kepez", "Konyaaltı", "Korkuteli", "Kumluca", "Manavgat", "Muratpaşa", "Serik"]
            ],
            [
                'id' => 75,
                "title" => "Ardahan",
                "districts" => ["Ardahan", "Çıldır", "Damal", "Göle", "Hanak", "Posof"]
            ],
            [
                'id' => 8,
                "title" => "Artvin",
                "districts" => ["Ardanuç", "Arhavi", "Artvin", "Borçka", "Hopa", "Murgul", "Şavşat", "Yusufeli"]
            ],
            [
                'id' => 9,
                "title" => "Aydın",
                "districts" => ["Bozdoğan", "Buharkent", "Çine", "Didim", "Efeler", "Germencik", "İncirliova", "Karacasu", "Karpuzlu", "Koçarlı", "Köşk", "Kuşadası", "Kuyucak", "Nazilli", "Söke", "Sultanhisar", "Yenipazar"]
            ],
            [
                'id' => 10,
                "title" => "Balıkesir",
                "districts" => ["Altıeylül", "Ayvalık", "Balya", "Bandırma", "Bigadiç", "Burhaniye", "Dursunbey", "Edremit", "Erdek", "Gömeç", "Gönen", "Havran", "İvrindi", "Karesi", "Kepsut", "Manyas", "Marmara", "Savaştepe", "Sındırgı", "Susurluk"]
            ],
            [
                'id' => 74,
                "title" => "Bartın",
                "districts" => ["Amasra", "Bartın", "Kurucaşile", "Ulus"]
            ],
            [
                'id' => 72,
                "title" => "Batman",
                "districts" => ["Batman", "Beşiri", "Gercüş", "Hasankeyf", "Kozluk", "Sason"]
            ],
            [
                'id' => 69,
                "title" => "Bayburt",
                "districts" => ["Aydıntepe", "Bayburt (İl merkezi)", "Demirözü"]
            ],
            [
                'id' => 11,
                "title" => "Bilecik",
                "districts" => ["Bilecik", "Bozüyük", "Gölpazarı", "İnhisar", "Osmaneli", "Pazaryeri", "Söğüt", "Yenipazar"]
            ],
            [
                'id' => 12,
                "title" => "Bingöl",
                "districts" => ["Adaklı", "Bingöl", "Genç", "Karlıova", "Kiğı", "Solhan", "Yayladere", "Yedisu"]
            ],
            [
                'id' => 13,
                "title" => "Bitlis",
                "districts" => ["Adilcevaz", "Ahlat", "Bitlis", "Güroymak", "Hizan", "Mutki", "Tatvan"]
            ],
            [
                'id' => 14,
                "title" => "Bolu",
                "districts" => ["Bolu", "Dörtdivan", "Gerede", "Göynük", "Kıbrıscık", "Mengen", "Mudurnu", "Seben", "Yeniçağa"]
            ],
            [
                'id' => 15,
                "title" => "Burdur",
                "districts" => ["Ağlasun", "Altınyayla", "Bucak", "Burdur", "Çavdır", "Çeltikçi", "Gölhisar", "Karamanlı", "Kemer", "Tefenni", "Yeşilova"]
            ],
            [
                'id' => 16,
                "title" => "Bursa",
                "districts" => ["Büyükorhan", "Gemlik", "Gürsu", "Harmancık", "İnegöl", "İznik", "Karacabey", "Keles", "Kestel", "Mudanya", "Mustafakemalpaşa", "Nilüfer", "Orhaneli", "Orhangazi", "Osmangazi", "Yenişehir", "Yıldırım"]
            ],
            [
                'id' => 17,
                "title" => "Çanakkale",
                "districts" => ["Ayvacık", "Bayramiç", "Biga", "Bozcaada", "Çan", "Çanakkale", "Eceabat", "Ezine", "Gelibolu", "Gökçeada", "Lapseki", "Yenice"]
            ],
            [
                'id' => 18,
                "title" => "Çankırı",
                "districts" => ["Atkaracalar", "Bayramören", "Çankırı", "Çerkeş", "Eldivan", "Ilgaz", "Kızılırmak", "Korgun", "Kurşunlu", "Orta", "Şabanözü", "Yapraklı"]
            ],
            [
                'id' => 19,
                "title" => "Çorum",
                "districts" => ["Alaca", "Bayat", "Boğazkale", "Çorum", "Dodurga", "İskilip", "Kargı", "Laçin", "Mecitözü", "Oğuzlar", "Ortaköy", "Osmancık", "Sungurlu", "Uğurludağ"]
            ],
            [
                'id' => 20,
                "title" => "Denizli",
                "districts" => ["Acıpayam", "Babadağ", "Baklan", "Bekilli", "Beyağaç", "Bozkurt", "Buldan", "Çal", "Çameli", "Çardak", "Çivril", "Güney", "Honaz", "Kale", "Merkezefendi", "Pamukkale", "Sarayköy", "Serinhisar", "Tavas"]
            ],
            [
                'id' => 21,
                "title" => "Diyarbakır",
                "districts" => ["Bağlar", "Bismil", "Çermik", "Çınar", "Çüngüş", "Dicle", "Eğil", "Ergani", "Hani", "Hazro", "Kayapınar", "Kocaköy", "Kulp", "Lice", "Silvan", "Sur", "Yenişehir"]
            ],
            [
                'id' => 81,
                "title" => "Düzce",
                "districts" => ["Akçakoca", "Cumayeri", "Çilimli", "Düzce", "Gölyaka", "Gümüşova", "Kaynaşlı", "Yığılca"]
            ],
            [
                'id' => 22,
                "title" => "Edirne",
                "districts" => ["Enez", "Havsa", "İpsala", "Keşan", "Lalapaşa", "Meriç", "Merkez", "Süloğlu", "Uzunköprü"]
            ],
            [
                'id' => 23,
                "title" => "Elâzığ",
                "districts" => ["Ağın", "Alacakaya", "Arıcak", "Baskil", "Elâzığ", "Karakoçan", "Keban", "Kovancılar", "Maden", "Palu", "Sivrice"]
            ],
            [
                'id' => 24,
                "title" => "Erzincan",
                "districts" => ["Çayırlı", "Erzincan", "İliç", "Kemah", "Kemaliye", "Otlukbeli", "Refahiye", "Tercan", "Üzümlü"]
            ],
            [
                'id' => 25,
                "title" => "Erzurum",
                "districts" => ["Aşkale", "Aziziye", "Çat", "Hınıs", "Horasan", "İspir", "Karaçoban", "Karayazı", "Köprüköy", "Narman", "Oltu", "Olur", "Palandöken", "Pasinler", "Pazaryolu", "Şenkaya", "Tekman", "Tortum", "Uzundere", "Yakutiye"]
            ],
            [
                'id' => 26,
                "title" => "Eskişehir",
                "districts" => ["Alpu", "Beylikova", "Çifteler", "Günyüzü", "Han", "İnönü", "Mahmudiye", "Mihalgazi", "Mihalıççık", "Odunpazarı", "Sarıcakaya", "Seyitgazi", "Sivrihisar", "Tepebaşı"]
            ],
            [
                'id' => 27,
                "title" => "Gaziantep",
                "districts" => ["Araban", "İslahiye", "Karkamış", "Nizip", "Nurdağı", "Oğuzeli", "Şahinbey", "Şehitkâmil", "Yavuzeli"]
            ],
            [
                'id' => 28,
                "title" => "Giresun",
                "districts" => ["Alucra", "Bulancak", "Çamoluk", "Çanakçı", "Dereli", "Doğankent", "Espiye", "Eynesil", "Giresun", "Görele", "Güce", "Keşap", "Piraziz", "Şebinkarahisar", "Tirebolu", "Yağlıdere"]
            ],
            [
                'id' => 29,
                "title" => "Gümüşhane",
                "districts" => ["Gümüşhane", "Kelkit", "Köse", "Kürtün", "Şiran", "Torul"]
            ],
            [
                'id' => 30,
                "title" => "Hakkâri",
                "districts" => ["Çukurca", "Hakkâri", "Şemdinli", "Yüksekova"]
            ],
            [
                'id' => 31,
                "title" => "Hatay",
                "districts" => ["Altınözü", "Antakya", "Arsuz", "Belen", "Defne", "Dörtyol", "Erzin", "Hassa", "İskenderun", "Kırıkhan", "Kumlu", "Payas", "Reyhanlı", "Samandağ", "Yayladağı"]
            ],
            [
                'id' => 76,
                "title" => "Iğdır",
                "districts" => ["Aralık", "Iğdır", "Karakoyunlu", "Tuzluca"]
            ],
            [
                'id' => 32,
                "title" => "Isparta",
                "districts" => ["Aksu", "Atabey", "Eğirdir", "Gelendost", "Gönen", "Isparta", "Keçiborlu", "Senirkent", "Sütçüler", "Şarkikaraağaç", "Uluborlu", "Yalvaç", "Yenişarbademli"]
            ],
            [
                'id' => 34,
                "title" => "İstanbul",
                "districts" => ["Adalar", "Arnavutköy", "Ataşehir", "Avcılar", "Bağcılar", "Bahçelievler", "Bakırköy", "Başakşehir", "Bayrampaşa", "Beşiktaş", "Beykoz", "Beylikdüzü", "Beyoğlu", "Büyükçekmece", "Çatalca", "Çekmeköy", "Esenler", "Esenyurt", "Eyüp", "Fatih", "Gaziosmanpaşa", "Güngören", "Kadıköy", "Kağıthane", "Kartal", "Küçükçekmece", "Maltepe", "Pendik", "Sancaktepe", "Sarıyer", "Silivri", "Sultanbeyli", "Sultangazi", "Şile", "Şişli", "Tuzla", "Ümraniye", "Üsküdar", "Zeytinburnu"]
            ],
            [
                'id' => 35,
                "title" => "İzmir",
                "districts" => ["Aliağa", "Balçova", "Bayındır", "Bayraklı", "Bergama", "Beydağ", "Bornova", "Buca", "Çeşme", "Çiğli", "Dikili", "Foça", "Gaziemir", "Güzelbahçe", "Karabağlar", "Karaburun", "Karşıyaka", "Kemalpaşa", "Kınık", "Kiraz", "Konak", "Menderes", "Menemen", "Narlıdere", "Ödemiş", "Seferihisar", "Selçuk", "Tire", "Torbalı", "Urla"]
            ],
            [
                'id' => 46,
                "title" => "Kahramanmaraş",
                "districts" => ["Afşin", "Andırın", "Çağlayancerit", "Dulkadiroğlu", "Ekinözü", "Elbistan", "Göksun", "Nurhak", "Onikişubat", "Pazarcık", "Türkoğlu"]
            ],
            [
                'id' => 78,
                "title" => "Karabük",
                "districts" => ["Eflani", "Eskipazar", "Karabük", "Ovacık", "Safranbolu", "Yenice"]
            ],
            [
                'id' => 70,
                "title" => "Karaman",
                "districts" => ["Ayrancı", "Başyayla", "Ermenek", "Karaman", "Kazımkarabekir", "Sarıveliler"]
            ],
            [
                'id' => 36,
                "title" => "Kars",
                "districts" => ["Akyaka", "Arpaçay", "Digor", "Kağızman", "Kars", "Sarıkamış", "Selim", "Susuz"]
            ],
            [
                'id' => 37,
                "title" => "Kastamonu",
                "districts" => ["Abana", "Ağlı", "Araç", "Azdavay", "Bozkurt", "Cide", "Çatalzeytin", "Daday", "Devrekani", "Doğanyurt", "Hanönü", "İhsangazi", "İnebolu", "Kastamonu", "Küre", "Pınarbaşı", "Seydiler", "Şenpazar", "Taşköprü", "Tosya"]
            ],
            [
                'id' => 38,
                "title" => "Kayseri",
                "districts" => ["Akkışla", "Bünyan", "Develi", "Felahiye", "Hacılar", "İncesu", "Kocasinan", "Melikgazi", "Özvatan", "Pınarbaşı", "Sarıoğlan", "Sarız", "Talas", "Tomarza", "Yahyalı", "Yeşilhisar"]
            ],
            [
                'id' => 71,
                "title" => "Kırıkkale",
                "districts" => ["Bahşılı", "Balışeyh", "Çelebi", "Delice", "Karakeçili", "Keskin", "Kırıkkale", "Sulakyurt", "Yahşihan"]
            ],
            [
                'id' => 39,
                "title" => "Kırklareli",
                "districts" => ["Babaeski", "Demirköy", "Kırklareli", "Kofçaz", "Lüleburgaz", "Pehlivanköy", "Pınarhisar", "Vize"]
            ],
            [
                'id' => 40,
                "title" => "Kırşehir",
                "districts" => ["Akçakent", "Akpınar", "Boztepe", "Çiçekdağı", "Kaman", "Kırşehir", "Mucur"]
            ],
            [
                'id' => 79,
                "title" => "Kilis",
                "districts" => ["Elbeyli", "Kilis", "Musabeyli", "Polateli"]
            ],
            [
                'id' => 41,
                "title" => "Kocaeli",
                "districts" => ["Başiskele", "Çayırova", "Darıca", "Derince", "Dilovası", "Gebze", "Gölcük", "İzmit", "Kandıra", "Karamürsel", "Kartepe", "Körfez"]
            ],
            [
                'id' => 42,
                "title" => "Konya",
                "districts" => ["Ahırlı", "Akören", "Akşehir", "Altınekin", "Beyşehir", "Bozkır", "Cihanbeyli", "Çeltik", "Çumra", "Derbent", "Derebucak", "Doğanhisar", "Emirgazi", "Ereğli", "Güneysınır", "Hadım", "Halkapınar", "Hüyük", "Ilgın", "Kadınhanı", "Karapınar", "Karatay", "Kulu", "Meram", "Sarayönü", "Selçuklu", "Seydişehir", "Taşkent", "Tuzlukçu", "Yalıhüyük", "Yunak"]
            ],
            [
                'id' => 43,
                "title" => "Kütahya",
                "districts" => ["Altıntaş", "Aslanapa", "Çavdarhisar", "Domaniç", "Dumlupınar", "Emet", "Gediz", "Hisarcık", "Kütahya", "Pazarlar", "Şaphane", "Simav", "Tavşanlı"]
            ],
            [
                'id' => 44,
                "title" => "Malatya",
                "districts" => ["Akçadağ", "Arapgir", "Arguvan", "Battalgazi", "Darende", "Doğanşehir", "Doğanyol", "Hekimhan", "Kale", "Kuluncak", "Pütürge", "Yazıhan", "Yeşilyurt"]
            ],
            [
                'id' => 45,
                "title" => "Manisa",
                "districts" => ["Ahmetli", "Akhisar", "Alaşehir", "Demirci", "Gölmarmara", "Gördes", "Kırkağaç", "Köprübaşı", "Kula", "Salihli", "Sarıgöl", "Saruhanlı", "Selendi", "Soma", "Şehzadeler", "Turgutlu", "Yunusemre"]
            ],
            [
                'id' => 47,
                "title" => "Mardin",
                "districts" => ["Artuklu", "Dargeçit", "Derik", "Kızıltepe", "Mazıdağı", "Midyat", "Nusaybin", "Ömerli", "Savur", "Yeşilli"]
            ],
            [
                'id' => 33,
                "title" => "Mersin",
                "districts" => ["Akdeniz", "Anamur", "Aydıncık", "Bozyazı", "Çamlıyayla", "Erdemli", "Gülnar", "Mezitli", "Mut", "Silifke", "Tarsus", "Toroslar", "Yenişehir"]
            ],
            [
                'id' => 48,
                "title" => "Muğla",
                "districts" => ["Bodrum", "Dalaman", "Datça", "Fethiye", "Kavaklıdere", "Köyceğiz", "Marmaris", "Menteşe", "Milas", "Ortaca", "Seydikemer", "Ula", "Yatağan"]
            ],
            [
                'id' => 49,
                "title" => "Muş",
                "districts" => ["Bulanık", "Hasköy", "Korkut", "Malazgirt", "Muş", "Varto"]
            ],
            [
                'id' => 50,
                "title" => "Nevşehir",
                "districts" => ["Acıgöl", "Avanos", "Derinkuyu", "Gülşehir", "Hacıbektaş", "Kozaklı", "Nevşehir", "Ürgüp"]
            ],
            [
                'id' => 51,
                "title" => "Niğde",
                "districts" => ["Altunhisar", "Bor", "Çamardı", "Çiftlik", "Niğde", "Ulukışla"]
            ],
            [
                'id' => 52,
                "title" => "Ordu",
                "districts" => ["Akkuş", "Altınordu", "Aybastı", "Çamaş", "Çatalpınar", "Çaybaşı", "Fatsa", "Gölköy", "Gülyalı", "Gürgentepe", "İkizce", "Kabadüz", "Kabataş", "Korgan", "Kumru", "Mesudiye", "Perşembe", "Ulubey", "Ünye"]
            ],
            [
                'id' => 80,
                "title" => "Osmaniye",
                "districts" => ["Bahçe", "Düziçi", "Hasanbeyli", "Kadirli", "Osmaniye", "Sumbas", "Toprakkale"]
            ],
            [
                'id' => 53,
                "title" => "Rize",
                "districts" => ["Ardeşen", "Çamlıhemşin", "Çayeli", "Derepazarı", "Fındıklı", "Güneysu", "Hemşin", "İkizdere", "İyidere", "Kalkandere", "Pazar", "Rize"]
            ],
            [
                'id' => 54,
                "title" => "Sakarya",
                "districts" => ["Adapazarı", "Akyazı", "Arifiye", "Erenler", "Ferizli", "Geyve", "Hendek", "Karapürçek", "Karasu", "Kaynarca", "Kocaali", "Pamukova", "Sapanca", "Serdivan", "Söğütlü", "Taraklı"]
            ],
            [
                'id' => 55,
                "title" => "Samsun",
                "districts" => ["Alaçam", "Asarcık", "Atakum", "Ayvacık", "Bafra", "Canik", "Çarşamba", "Havza", "İlkadım", "Kavak", "Ladik", "Ondokuzmayıs", "Salıpazarı", "Tekkeköy", "Terme", "Vezirköprü", "Yakakent"]
            ],
            [
                'id' => 56,
                "title" => "Siirt",
                "districts" => ["Siirt", "Tillo", "Baykan", "Eruh", "Kurtalan", "Pervari", "Şirvan"]
            ],
            [
                'id' => 57,
                "title" => "Sinop",
                "districts" => ["Ayancık", "Boyabat", "Dikmen", "Durağan", "Erfelek", "Gerze", "Saraydüzü", "Sinop", "Türkeli"]
            ],
            [
                'id' => 58,
                "title" => "Sivas",
                "districts" => ["Akıncılar", "Altınyayla", "Divriği", "Doğanşar", "Gemerek", "Gölova", "Hafik", "İmranlı", "Kangal", "Koyulhisar", "Sivas", "Suşehri", "Şarkışla", "Ulaş", "Yıldızeli", "Zara", "Gürün"]
            ],
            [
                'id' => 63,
                "title" => "Şanlıurfa",
                "districts" => ["Akçakale", "Birecik", "Bozova", "Ceylanpınar", "Eyyübiye", "Halfeti", "Haliliye", "Harran", "Hilvan", "Karaköprü", "Siverek", "Suruç", "Viranşehir"]
            ],
            [
                'id' => 73,
                "title" => "Şırnak",
                "districts" => ["Beytüşşebap", "Cizre", "Güçlükonak", "İdil", "Silopi", "Şırnak", "Uludere"]
            ],
            [
                'id' => 59,
                "title" => "Tekirdağ",
                "districts" => ["Çerkezköy", "Çorlu", "Ergene", "Hayrabolu", "Kapaklı", "Malkara", "Marmara Ereğlisi", "Muratlı", "Saray", "Süleymanpaşa", "Şarköy"]
            ],
            [
                'id' => 60,
                "title" => "Tokat",
                "districts" => ["Almus", "Artova", "Başçiftlik", "Erbaa", "Niksar", "Pazar", "Reşadiye", "Sulusaray", "Tokat", "Turhal", "Yeşilyurt", "Zile"]
            ],
            [
                'id' => 61,
                "title" => "Trabzon",
                "districts" => ["Akçaabat", "Araklı", "Arsin", "Beşikdüzü", "Çarşıbaşı", "Çaykara", "Dernekpazarı", "Düzköy", "Hayrat", "Köprübaşı", "Maçka", "Of", "Ortahisar", "Sürmene", "Şalpazarı", "Tonya", "Vakfıkebir", "Yomra"]
            ],
            [
                'id' => 62,
                "title" => "Tunceli",
                "districts" => ["Çemişgezek", "Hozat", "Mazgirt", "Nazımiye", "Ovacık", "Pertek", "Pülümür", "Tunceli"]
            ],
            [
                'id' => 64,
                "title" => "Uşak",
                "districts" => ["Banaz", "Eşme", "Karahallı", "Sivaslı", "Ulubey", "Uşak"]
            ],
            [
                'id' => 65,
                "title" => "Van",
                "districts" => ["Bahçesaray", "Başkale", "Çaldıran", "Çatak", "Edremit", "Erciş", "Gevaş", "Gürpınar", "İpekyolu", "Muradiye", "Özalp", "Saray", "Tuşba"]
            ],
            [
                'id' => 77,
                "title" => "Yalova",
                "districts" => ["Altınova", "Armutlu", "Çınarcık", "Çiftlikköy", "Termal", "Yalova"]
            ],
            [
                'id' => 66,
                "title" => "Yozgat",
                "districts" => ["Akdağmadeni", "Aydıncık", "Boğazlıyan", "Çandır", "Çayıralan", "Çekerek", "Kadışehri", "Saraykent", "Sarıkaya", "Sorgun", "Şefaatli", "Yenifakılı", "Yerköy", "Yozgat"]
            ],
            [
                'id' => 67,
                "title" => "Zonguldak",
                "districts" => ["Alaplı", "Çaycuma", "Devrek", "Gökçebey", "Kilimli", "Kozlu", "Karadeniz Ereğli", "Zonguldak"]
            ]
        ];

        Country::insert($data);
    }
}
