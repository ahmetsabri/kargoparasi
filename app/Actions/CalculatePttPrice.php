<?php

namespace App\Actions;

use Illuminate\Support\Facades\Process;

class CalculatePttPrice
{
    public function execute($agirlik = 1, $width = 0, $height = 0, $length = 0)
    {
        {
            $aps_kargo = [
                ["500"," 34.50",	"34.50	","41.50   "]          ,
                ["1000 "," 36.00",	"36.00	","48.00   " ]         ,
                ["2000	 "," 45.50","45.50	","55.00   " ]     ,
                ["3000 "," 50.00",	"50.00	","59.50   " ]         ,
                ["4000	 "," 54.75","53.50	","64.25   " ]     ,
                ["5000	 "," 59.50","57.00	","69.00   " ]     ,
                ["6000	 "," 64.25","60.50	","73.75   " ]     ,
                ["7000	 "," 69.00","64.00	","78.50   " ]     ,
                ["8000 "," 73.75",	"67.50	","83.25   " ]         ,
                ["9000	 "," 78.50","71.00	","88.00   " ]     ,
                ["10000","	83.25",	"74.50	","92.75   " ]     ,
                ["11000","	88.00","78.00	","97.50   " ]     ,
                ["12000","	92.75","81.50	"," 102.25 "  ]    ,
                ["13000","	97.50","85.00	"," 107.00 "  ]    ,
                ["14000","	102.25","88.50	","111.75  " ]     ,
                ["15000","	107.00","92.00	","116.50  " ]     ,
                ["16000","	111.75","95.50	","121.25  " ]     ,
                ["17000","	116.50","99.00	","126.00  " ]     ,
                ["18000","	121.25","102.50	","130.75  " ]     ,
                ["19000","	126.00","106.00	","135.50  " ]     ,
                ["20000","	130.75","109.50	","140.25  " ]     ,
                ["21000","	135.50","113.00	","145.00  " ]     ,
                ["22000","	140.25","116.50	","149.75  " ]     ,
                ["23000","	145.00","120.00	","154.50  " ]     ,
                ["24000","	149.75","123.50	","159.25  " ]     ,
                ["25000","	154.50","127.00	","164.00  " ]     ,
                ["26000","	159.25","130.50	","168.75  " ]     ,
                ["27000","	164.00","134.00	","173.50  " ]     ,
                ["28000","	168.75","137.50	","178.25  " ]     ,
                ["29000","	173.50","141.00	","183.00  " ]     ,
                ["30000","	178.25","144.50	","187.75  " ]     ,
                ["31000","	183.00","148.00	","192.50  " ]     ,
                ["32000","	187.75","151.50	","197.25  " ]     ,
                ["33000","	192.50","155.00	","202.00  " ]     ,
                ["34000","	197.25","158.50	","206.75  " ]     ,
                ["35000","	202.00","162.00	","211.50  " ]     ,
                ["36000","	206.75","165.50	","216.25  " ]     ,
                ["37000","	211.50","169.00	","221.00  " ]     ,
                ["38000","	216.25","172.50	","225.75  " ]     ,
                ["39000","	221.00","176.00	","230.50  " ]     ,
                ["40000","	225.75","179.50	","235.25  " ]     ,
                ["41000","	230.50","183.00	","240.00  " ]     ,
                ["42000","	235.25","186.50	","244.75  " ]     ,
                ["43000","	240.00","190.00	","249.50  " ]     ,
                ["44000","	244.75","193.50	","254.25  " ]     ,
                ["45000","	249.50","197.00	","259.00  " ]     ,
                ["46000","	254.25","200.50	","263.75  " ]     ,
                ["47000","	259.00","204.00	","268.50  " ]     ,
                ["48000","	263.75","207.50	","273.25  " ]     ,
                ["49000","	268.50","211.00	","278.00  " ]     ,
                ["50000","	273.25","214.50	","282.75  " ]     ,
                ["51000","	278.00","218.00	","287.50  " ]     ,
                ["52000","	282.75","221.50	","292.25  " ]     ,
                ["53000","	287.50","225.00	","297.00  " ]     ,
                ["54000","	292.25","228.50	","301.75  " ]     ,
                ["55000","	297.00","232.00	","306.50  " ]     ,
                ["56000","	301.75","235.50	","311.25  " ]     ,
                ["57000","	306.50","239.00	","316.00  " ]     ,
                ["58000","	311.25","242.50	","320.75  " ]     ,
                ["59000","	316.00","246.00	","325.50  " ]     ,
                ["60000","	320.75","249.50	","330.25  " ]     ,
                ["61000","	325.50","253.00	","335.00  " ]     ,
                ["62000","	330.25","256.50	","339.75  " ]     ,
                ["63000","	335.00","260.00	","344.50  " ]     ,
                ["64000","	339.75","263.50	","349.25  " ]     ,
                ["65000","	344.50","267.00	","354.00  " ]     ,
                ["66000","	349.25","270.50	","358.75  " ]     ,
                ["67000","	354.00","274.00	","363.50  " ]     ,
                ["68000","	358.75","277.50	","368.25  " ]     ,
                ["69000","	363.50","281.00	","373.00  " ]     ,
                ["70000","	368.25","284.50	","377.75  " ]     ,
                ["71000","	373.00","288.00	","382.50  " ]     ,
                ["72000","	377.75","291.50	","387.25  " ]     ,
                ["73000","	382.50","295.00	","392.00  " ]     ,
                ["74000","	387.25","298.50	","396.75  " ]     ,
                ["75000","	392.00","302.00	","401.50  " ]     ,
                ["76000","	396.75","305.50	","406.25  " ]     ,
                ["77000","	401.50","309.00	","411.00  " ]     ,
                ["78000","	406.25","312.50	","415.75  " ]     ,
                ["79000","	411.00","316.00	","420.50  " ]     ,
                ["80000","	415.75","319.50	","425.25  " ]     ,
                ["81000","	420.50","323.00	","430.00  " ]     ,
                ["82000","	425.25","326.50	","434.75  " ]     ,
                ["83000","	430.00","330.00	","439.50  " ]     ,
                ["84000","	434.75","333.50	","444.25  " ]     ,
                ["85000","	439.50","337.00	","449.00  " ]     ,
                ["86000","	444.25","340.50	","453.75  " ]     ,
                ["87000","	449.00","344.00	","458.50  " ]     ,
                ["88000","	453.75","347.50	","463.25  " ]     ,
                ["89000","	458.50","351.00	","468.00  " ]     ,
                ["90000","	463.25","354.50	","472.75  " ]     ,
                ["91000","	468.00","358.00	","477.50  " ]     ,
                ["92000","	472.75","361.50	","482.25  " ]     ,
                ["93000","	477.50","365.00	","487.00  " ]     ,
                ["94000","	482.25","368.50	","491.75  " ]     ,
                ["95000","	487.00","372.00	","496.50  " ]     ,
                ["96000","	491.75","375.50	","501.25  " ]     ,
                ["97000","	496.50","379.00	","506.00  " ]     ,
                ["98000","	501.25","382.50	","510.75  " ]     ,
                ["99000","	506.00","386.00	","515.50  " ]     ,
                ["100000","510.75","389.50","520.25"]


            ];
            $ucret = 0;
            $ucret1 = 0;
            $maxAgirlik = 0;
            $gonderitur_kktc = "";
            /** ***************************************************************** */
            /* TEMEL UCRETLER */
            /** **************************************************************** */
            /* Mektup ucretleri YI:Yurtici */
            $mektupArzuYI = [ 10.00, 12.50, 20.50, 26.00, 33.50, 41.50, 49.50];
            $mektupAgirlikYI = [ 20, 50, 100, 250, 500, 1000, 2000 ];
            $mektupUcretAgirlikKesirYIArzu = [1000,10.50];
            $postaKartiUcretYI_arzu1 = 10.00;
            // $postaKartiUcretYI_arzu = 2.40; ensondevredeolan

            /* Kucuk Paket ucretleri YI:Yurtici */
            $kucukPaketUcretYI = [ 5.50, 5.50, 5.50, 7.00 ];
            $kucukPaketAgirlikYI = [ 250, 500, 1000, 2000 ];

            /* Tebligat ucretleri YI:Yurtici */
            $tebligatUcretYI = [ 58.00, 77.00, 81.00, 85.00 ];
            $tebligatAgirlikYI = [ 100, 250, 500, 1000 ];
            $tebligatUcretAgirlikKesirYI = [ 1000, 9.50 ];

            $yztebligatUcretYI = [ 58.00, 77.00, 81.00, 85.00 ];
            $yztebligatAgirlikYI = [ 100, 250, 500, 1000 ];
            $yztebligatUcretAgirlikKesirYI = [ 1000, 9.50 ];

            $MTStebligatUcretYI = [ 68.50, 87.50, 91.50, 95.50 ];
            $MTStebligatAgirlikYI = [ 100, 250, 500, 1000 ];
            $MTStebligatUcretAgirlikKesirYI = [ 1000, 9.50 ];

            /* Aps Tebligat ucretleri YI:Yurtici */
            $ApstebligatUcretYI = [ 116.00, 122.50, 134.00, 145.00 ];
            $ApstebligatAgirlikYI = [ 100, 250, 500, 1000 ];
            $ApstebligatUcretAgirlikKesirYI = [ 1000, 18.00 ];

            /* Korlere Ozgu Yazi (Sekogram) ucretleri YI:Yurtici */
            $korlereOzguYaziUcretYI = 18.00;
            $korlereOzguKayitsizYaziUcretYI = 0.00;

            /* Basilmis Kagit ucretleri YI:Yurtici */
            $basilmisKagitUcretYIB = [ 10.50, 12.50, 20.50, 23.50, 26.00, 33.50, 41.50,
                    49.50 ];
            $basilmisKagitAgirlikYIB = [ 20, 50, 100, 150, 250, 500, 1000, 2000 ];
            $basilmisKagitUcretAgirlikKesirYIB = [ 1000, 0.75 ];

            /* Adressiz Basilmis Kagit ucretleri */
            $adressizKagitUcret = 0.15;
            /* */
            $adressizKagitUcretYI = [ 0.20, 0.75, 1.50 ];
            $adressizKagitAgirlikYI = [ 100, 250, 500 ];

            $posVerGazeteUcretYI = [ 0.40, 0.45, 0.80, 7.50,9.00, 10.50 ];
            $posVerGazeteAgirlikYI = [ 50, 100, 250, 500, 1000, 2000 ];
            $posVerGazeteUcretAgirlikKesirYI = [ 1000, 0.50 ];

            /* Basilmis Kagit Kapsayan "M" cantasi ucretleri YI:Yurtici */
            // $mCantaUcretYI = [ 2.30 ];
            $mCantaUcretYI = [ 38.00 ];
            $mCantaAgirlikYI = [ 1000 ];
            $mCantaUcretAgirlikKesirYI = [ 1000, 0.55 ];

            $tebrikdavetiyeSITeslimatUcretiYI = [ 11.80, 12.60, 18.80, 19.50, 20.50 ];
            $tebrikdavetiyeSITeslimatAgirlikYI = [ 100, 250, 500, 1000, 2000 ];

            // kayitli sehiriçi teslim
            $tebrikdavetiyeSehiriciTeslimatUcretiYI = [ 24.00, 25.00, 26.00, 27.50,
                    28.00, 42.00, 43.50, 51.00 ];
            $tebrikdavetiyeSehiriciTeslimatAgirlikYI = [ 20, 50, 100, 150, 250, 500,
                    1000, 2000 ];

            // kayitli yurt içi
            $tebrikdavetiyeUcretYI = [ 28.50, 30.50, 38.50, 41.50, 44.00, 51.50, 59.50,
                    67.50 ];
            $tebrikdavetiyeAgirlikYI = [ 20, 50, 100, 150, 250, 500, 1000, 2000 ];

            // kayitsiz tebrik ücretleri
            $tebrikdavetiyeUcretYIkayitsiz = [ 10.50, 12.50, 20.50, 23.50, 26.00, 33.50,
                    41.50, 49.50 ];
            $tebrikdavetiyeAgirlikYIkayitsiz = [ 20, 50, 100, 150, 250, 500, 1000, 2000 ];

            $tebrikdavetiyeUcretAgirlikKesriYI = [ 1000, 0.55 ];
            $tebrikdavetiyeSehiriciTeslimatUcreti100YI = 2.50;
            $tebrikdavetiyeSehiriciTeslimatUcreti250YI = 2.00;

            /* APS KURYE */
            $apgUcretYI = [ 24.00, 26.00, 30.00 ];
            $apgAgirlikYI = [ 500, 1000, 2000 ];
            $apgUcretAgirlikKesirYI = [ 1000, 1.50 ];

            $koliSehirIciUcretYI = [ 7.00, 7.00, 8.50 ];
            $koliSehirIciAgirlikYI = [ 2000, 3000, 50000 ];
            $koliSehirIciUcretYImax = [ 18.00 ];
            $koliSehirIciAgirlikYImax = [ 50000 ];
            $koliSehirIciUcretAgirlikKesirYI = [ 1000, 0.40 ];
            $koliSehirIciUcretDesiKesirYI = [ 1000, 0.40 ];
            $koliSehirIciUcretAgirlikKesirYImax = [ 1000, 0.50 ];

            $koliUcretYI = [ 4.00, 5.50, 6.00 ];
            $koliAgirlikYI = [ 2000, 3000, 50000 ];
            $koliUcretYImax = [ 40.75 ];
            $koliAgirlikYImax = [ 50000 ];
            $koliUcretAgirlikKesirYI = [ 1000, 0.75 ];
            $koliUcretAgirlikKesirYImax = [ 1000, 1.00 ];
            $koliUcretDesiKesirYI = [ 1000, 0.50 ];

            $koliVipUcretYI = [ 7.00, 8.00, 10.50 ];
            $koliVipAgirlikYI = [ 2000, 3000, 50000 ];
            $koliVipUcretAgirlikKesirYI = [ 1000, 1.75 ];

            /* KapÄ±dan KapÄ±ya Teslim Servisi (KKTS) ucretleri YI:Yurtici */
            $KKTSIlIciUcretYI = [ 9.50 ];
            $KKTSIlIciAgirlikYI = [ 1000 ];
            $KKTSIlIciUcretAgirlikKesirYI = [ 1000, 1.00 ];
            // desi
            $KKTSIlIciUcretDesiKesirYI = [ 1000, 0.75 ];

            $KKTSIlDisiUcretYI = [ 9.00 ];
            $KKTSIlDisiAgirlikYI = [ 1000 ];
            $KKTSIlDisiUcretAgirlikKesirYI = [ 1000, 1.75 ];

            $KKTSIlIciTebligatUcretYI = 25.00;
            $KKTSIlDisiTebligatUcretYI = 30.00;

            /* Telgraf ï¿½cretleri YI:Yurtici */
            $telgrafAsgariUcretYI = [ 17.00, 34.00, 7.50 ];// ilk normal,2. acele
            // telgraf
            $telgrafKelimeUcretYI = [ 1.70, 3.40, 0.75 ];

            /* Havale ucretleri YI:Yurtici */
            // $havaleUcretYI = [3.50,5.00,7.00,10.00,14.00,17.00];
            $havaleUcretYI = [ 5.00, 9.00, 11.00, 17.00, 22.00, 28.00, 33.00, 40.00 ];
            $postaCekiUcretYI = [ 1.50, 3.00, 6.00, 8.00, 11.00, 14.00, 17.00, 19.00 ];

            /* Posta ceki YatÄ±rma ucretleri YI:Yurtiï¿½i */
            // $postaCekiUcretYI = [1.00,1.50,2.00,3.00,4.00,5.00,6.00];
            $agirlikYIUstLimitMektup = 5000;
            $agirlikYIUstLimitPKarti = 2000;
            $agirlikYIUstLimitKPaket = 2000;
            $agirlikYIUstLimitMTorba = 30000;
            $agirlikYIUstLimitKOzguYazi = 7000;
            $agirlikYIUstLimitBasKagit = 5000;
            $agirlikYIUstLimitTebrik = 2000;
            $desi_kargo1 = $width * $height * $length / 3000;
            $desi_kargo1 = $desi_kargo1 * 1000;
            $kontrol_artis = 0;

            $kontrol_deger = $desi_kargo1;
            if ($agirlik > $desi_kargo1) {
                $kontrol_deger = $agirlik;
            }
            if ($kontrol_deger > 100000) {
                $kontrol_artis = intval(ceil(($kontrol_deger - 100000) / 1000));
            }

            for ($i = 0; $i < count($aps_kargo); $i++) {
                if ($kontrol_deger <= $aps_kargo[$i][0]) {
                    $ucret = intval($aps_kargo[$i][3]);
                    break;
                }
            }
            if (!isset($ucret) || $ucret == 0) {
                $ucret = intval($aps_kargo[count($aps_kargo) - 1][3]);
            }
            if ($kontrol_artis > 0) {
                $ucret = $ucret + ($kontrol_artis * 4.75);
                // PTT kargoda ptt işyer teslim dışında Ağır yük bedelleri eklenir..
                $ucret = $ucret + 350.00;
            }
            $price = $ucret;
            $price = (new GetFinalValueAction)->execute($price);
            return $price ? str_replace('.', ',', $price) . ' TL' : null;
        }
    }
}
