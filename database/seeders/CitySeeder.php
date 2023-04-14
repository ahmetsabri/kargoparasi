<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cityPlates = [
            "Adana" => "01",
            "Adıyaman" => "02",
            "Afyonkarahisar" => "03",
            "Ağrı" => "04",
            "Amasya" => "05",
            "Ankara" => "06",
            "Antalya" => "07",
            "Artvin" => "08",
            "Aydın" => "09",
            "Balıkesir" => "10",
            "Bilecik" => "11",
            "Bingöl" => "12",
            "Bitlis" => "13",
            "Bolu" => "14",
            "Burdur" => "15",
            "Bursa" => "16",
            "Çanakkale" => "17",
            "Çankırı" => "18",
            "Çorum" => "19",
            "Denizli" => "20",
            "Diyarbakır" => "21",
            "Edirne" => "22",
            "Elazığ" => "23",
            "Erzincan" => "24",
            "Erzurum" => "25",
            "Eskişehir" => "26",
            "Gaziantep" => "27",
            "Giresun" => "28",
            "Gümüşhane" => "29",
            "Hakkari" => "30",
            "Hatay" => "31",
            "Isparta" => "32",
            "Mersin" => "33",
            "İstanbul" => "34",
            "İzmir" => "35",
            "Kars" => "36",
            "Kastamonu" => "37",
            "Kayseri" => "38",
            "Kırklareli" => "39",
            "Kırşehir" => "40",
            "Kocaeli" => "41",
            "Konya" => "42",
            "Kütahya" => "43",
            "Malatya" => "44",
            "Manisa" => "45",
            "Kahramanmaraş" => "46",
            "Mardin" => "47",
            "Muğla" => "48",
            "Muş" => "49",
            "Nevşehir" => "50",
            "Niğde" => "51",
            "Ordu" => "52",
            "Rize" => "53",
            "Sakarya" => "54",
            "Samsun" => "55",
            "Siirt" => "56",
            "Sinop" => "57",
            "Sivas" => "58",
            "Tekirdağ" => "59",
            "Tokat" => "60",
            "Trabzon" => "61",
            "Tunceli" => "62",
            "Şanlıurfa" => "63",
            "Uşak" => "64",
            "Van" => "65",
            "Yozgat" => "66",
            "Zonguldak" => "67",
            "Aksaray" => "68",
            "Bayburt" => "69",
            "Karaman" => "70",
            "Kırıkkale" => "71",
            "Batman" => "72",
            "Şırnak" => "73",
            "Bartın" => "74",
            "Ardahan" => "75",
            "Iğdır" => "76",
            "Yalova" => "77",
            "Karabük" => "78",
            "Kilis" => "79",
            "Osmaniye" => "80",
            "Düzce" => "81"
        ];

        foreach ($cityPlates as $city => $plate) {
            $city = City::updateOrCreate(['plate' => $plate], [
                'name' => $city,
                'plate' => $plate,
            ]);
        }
    }
}
