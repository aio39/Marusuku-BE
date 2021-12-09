<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;





class MenuFactory extends Factory
{


    protected  $model = Menu::class;

    public static $IMAGES = [
        'photo-1414235077428-338989a2e8c0.jpg',
        'photo-1432139509613-5c4255815697.jpg',
        'photo-1432139555190-58524dae6a55.jpg',
        'photo-1438907046657-4ae137eb8c5e.jpg',
        'photo-1447078806655-40579c2520d6.jpg',
        'photo-1452967712862-0cca1839ff27.jpg',
        'photo-1455619452474-d2be8b1e70cd.jpg',
        'photo-1455853739633-8c94c03d8121.jpg',
        'photo-1457460866886-40ef8d4b42a0.jpg',
        'photo-1458642849426-cfb724f15ef7.jpg',
        'photo-1458644267420-66bc8a5f21e4.jpg',
        'photo-1459789034005-ba29c5783491.jpg',
        'photo-1464093515883-ec948246accb.jpg',
        'photo-1464306208223-e0b4495a5553.jpg',
        'photo-1465014925804-7b9ede58d0d7.jpg',
        'photo-1466637574441-749b8f19452f.jpg',
        'photo-1467003909585-2f8a72700288.jpg',
        'photo-1470324161839-ce2bb6fa6bc3.jpg',
        'photo-1470337458703-46ad1756a187.jpg',
        'photo-1473093226795-af9932fe5856.jpg',
        'photo-1473093295043-cdd812d0e601.jpg',
        'photo-1475090169767-40ed8d18f67d.jpg',
        'photo-1476224203421-9ac39bcb3327.jpg',
        'photo-1476718406336-bb5a9690ee2a.jpg',
        'photo-1478144592103-25e218a04891.jpg',
        'photo-1478145046317-39f10e56b5e9.jpg',
        'photo-1481070555726-e2fe8357725c.jpg',
        'photo-1481931098730-318b6f776db0.jpg',
        'photo-1482049016688-2d3e1b311543.jpg',
        'photo-1483137140003-ae073b395549.jpg',
        'photo-1483918793747-5adbf82956c4.jpg',
        'photo-1484300681262-5cca666b0954.jpg',
        'photo-1484723091739-30a097e8f929.jpg',
        'photo-1484980859177-5ac1249fda6f.jpg',
        'photo-1484980972926-edee96e0960d.jpg',
        'photo-1485704686097-ed47f7263ca4.jpg',
        'photo-1485963631004-f2f00b1d6606.jpg',
        'photo-1488477181946-6428a0291777.jpg',
        'photo-1488900128323-21503983a07e.jpg',
        'photo-1490457843367-34b21b6ccd85.jpg',
        'photo-1490474418585-ba9bad8fd0ea.jpg',
        'photo-1490645935967-10de6ba17061.jpg',
        'photo-1490818387583-1baba5e638af.jpg',
        'photo-1493770348161-369560ae357d.jpg',
        'photo-1494859802809-d069c3b71a8a.jpg',
        'photo-1495147466023-ac5c588e2e94.jpg',
        'photo-1495195129352-aeb325a55b65.jpg',
        'photo-1495195134817-aeb325a55b65.jpg',
        'photo-1496116218417-1a781b1c416c.jpg',
        'photo-1496412705862-e0088f16f791.jpg',
        'photo-1497034825429-c343d7c6a68f2.jpg',
        'photo-1497888329096-51c27beff665.jpg',
        'photo-1498579809087-ef1e558fd1da.jpg',
        'photo-1498837167922-ddd27525d352.jpg',
        'photo-1499028344343-cd173ffc68a9.jpg',
        'photo-1500217052183-bc01eee1a74e.jpg',
        'photo-1500315331616-db4f707c24d1.jpg',
        'photo-1501200291289-c5a76c232e5f.jpg',
        'photo-1501841633380-7de96991a027.jpg',
        'photo-1501959915551-4e8d30928317.jpg',
        'photo-1503631285924-e1544dce8b28.jpg',
        'photo-1504113888839-1c8eb50233d3.jpg',
        'photo-1504400739660-22ebeb14f00a.jpg',
        'photo-1504472685735-9bd4075b3779.jpg',
        'photo-1504674900247-0877df9cc836.jpg',
        'photo-1504712598893-24159a89200e.jpg',
        'photo-1504754524776-8f4f37790ca0.jpg',
        'photo-1505253716362-afaea1d3d1af.jpg',
        'photo-1505935428862-770b6f24f629.jpg',
        'photo-1506084868230-bb9d95c24759.jpg',
        'photo-1506368249639-73a05d6f6488.jpg',
        'photo-1506395308321-904a71783d60.jpg',
        'photo-1506459225024-1428097a7e18.jpg',
        'photo-1506655624258-6e7d8102f90f.jpg',
        'photo-1510629954389-c1e0da47d414.jpg',
        'photo-1510693306332-74189fa090d4.jpg',
        'photo-1511357840105-748c95f0a7e7.jpg',
        'photo-1511690743698-d9d85f2fbf38.jpg',
        'photo-1511909525232-61113c912358.jpg',
        'photo-1511993226957-cd166aba52d8.jpg',
        'photo-1511994714008-b6d68a8b32a2.jpg',
        'photo-1512621776951-a57141f2eefd.jpg',
        'photo-1513442542250-854d436a73f2.jpg',
        'photo-1514516870926-20598973e480.jpg',
        'photo-1514537099923-4c0fc7c73161.jpg',
        'photo-1514995428455-447d4443fa7f.jpg',
        'photo-1514995669114-6081e934b693.jpg',
        'photo-1515003197210-e0cd71810b5f.jpg',
        'photo-1515516969-d4008cc6241a.jpg',
        'photo-1516100882582-96c3a05fe590.jpg',
        'photo-1516211697506-8360dbcfe9a4.jpg',
        'photo-1516714435131-44d6b64dc6a2.jpg',
        'photo-1517093602195-b40af9688b46.jpg',
        'photo-1517433367423-c7e5b0f35086.jpg',
        'photo-1518171802599-4cd16785f93a.jpg',
        'photo-1518779578993-ec3579fee39f.jpg',
        'photo-1519077336050-4ca5cac9d64f.jpg',
        'photo-1519162808019-7de1683fa2ad.jpg',
        'photo-1519708227418-c8fd9a32b7a2.jpg',
        'photo-1519996409144-56c88c9aa612.jpg',
        'photo-1520218508822-998633d997e6.jpg',
        'photo-1522784081430-8ac6a122cbc8.jpg',
        'photo-1523049673857-eb18f1d7b578.jpg',
        'photo-1525059337994-6f2a1311b4d4.jpg',
        'photo-1525351326368-efbb5cb6814d.jpg',
        'photo-1525351484163-7529414344d8.jpg',
        'photo-1526318896980-cf78c088247c.jpg',
        'photo-1526678114169-b276d04ee180.jpg',
        'photo-1527598041828-aea5d622f3a8.jpg',
        'photo-1528198622811-0842b4e50787.jpg',
        'photo-1528207776546-365bb710ee93.jpg',
        'photo-1528502499757-107ea9369104.jpg',
        'photo-1528873981-36c6afde7b9d.jpg',
        'photo-1529042410759-befb1204b468.jpg',
        'photo-1530375930097-e957738bc0e6.jpg',
        'photo-1530554764233-e79e16c91d08.jpg',
        'photo-1532768907235-78653b7dc71d.jpg',
        'photo-1532939624-3af1308db9a5.jpg',
        'photo-1532980400857-e8d9d275d858.jpg',
        'photo-1533007414914-8f8f2510939e.jpg',
        'photo-1533143708019-ea5cfa80213e.jpg',
        'photo-1533782654613-826a072dd6f3.jpg',
        'photo-1533910534207-90f31029a78e.jpg',
        'photo-1534080564583-6be75777b70a.jpg',
        'photo-1534422298391-e4f8c172dddb.jpg',
        'photo-1534939561126-855b8675edd7.jpg',
        'photo-1535007813616-79dc02ba4021.jpg',
        'photo-1535229398509-70179087ac75.jpg',
        'photo-1535473895227-bdecb20fb157.jpg',
        'photo-1535567465397-7523840f2ae9.jpg',
        'photo-1536816579748-4ecb3f03d72a.jpg',
        'photo-1539136788836-5699e78bfc75.jpg',
        'photo-1540162416395-16f7dfbb68d1.jpg',
        'photo-1540189549336-e6e99c3679fe.jpg',
        'photo-1540713434306-58505cf1b6fc.jpg',
        'photo-1541095441899-5d96a6da10b8.jpg',
        'photo-1541151040323-4d766525ec84.jpg',
        'photo-1541766574321-8b81276f2102.jpg',
        'photo-1541795795328-f073b763494e.jpg',
        'photo-1543339308-43e59d6b73a6.jpg',
        'photo-1543362906-acfc16c67564.jpg',
        'photo-1543364195-bfe6e4932397.jpg',
        'photo-1543575590-64f1e1d06f3f.jpg',
        'photo-1544025162-d76694265947.jpg',
        'photo-1544726982-b414d58fabaa.jpg',
        'photo-1545092844-0c99aa3b6cab.jpg',
        'photo-1545822733-8347bd07d381.jpg',
        'photo-1546069901-ba9599a7e63c.jpg',
        'photo-1546241386-b9bc9fbdd0d1.jpg',
        'photo-1546554137-f86b9593a222.jpg',
        'photo-1547573854-74d2a71d0826.jpg',
        'photo-1547592180-85f173990554.jpg',
        'photo-1547754070-c73f90c116b5.jpg',
        'photo-1547928576-b822bc410bdf.jpg',
        'photo-1548940740-204726a19be3.jpg',
        'photo-1548943487-a2e4e43b4853.jpg',
        'photo-1550083656-0c3d8ad00e71.jpg',
        'photo-1550411294-b3b1bd5fce1b.jpg',
        'photo-1550852074-03227b5fe6fe.jpg',
        'photo-1551024506-0bccd828d307.jpg',
        'photo-1551404973-7dec6ee9bba7.jpg',
        'photo-1551782450-a2132b4ba21d.jpg',
        'photo-1554980291-c3e7cea75872.jpg',
        'photo-1554998171-706e730d721d.jpg',
        'photo-1555072956-7758afb20e8f.jpg',
        'photo-1555243896-c709bfa0b564.jpg',
        'photo-1555939594-58d7cb561ad1.jpg',
        'photo-1556040220-4096d522378d.jpg',
        'photo-1556386734-4227a180d19e.jpg',
        'photo-1557748362-4e95f0de4f6f.jpg',
        'photo-1558030006-450675393462.jpg',
        'photo-1558199141-391d935676f0.jpg',
        'photo-1558818498-28c1e002b655.jpg',
        'photo-1559313316-88174a12ce7c.jpg',
        'photo-1559737558-2f5a35f4523b.jpg',
        'photo-1559742811-822873691df8.jpg',
        'photo-1559814048-149b70765d47.jpg',
        'photo-1560155016-bd4879ae8f21.jpg',
        'photo-1560512823-829485b8bf24.jpg',
        'photo-1560684352-8497838a2229.jpg',
        'photo-1561758033-7e924f619b47.jpg',
        'photo-1561758033-d89a9ad46330.jpg',
        'photo-1562059390-a761a084768e.jpg',
        'photo-1563379926898-05f4575a45d8.jpg',
        'photo-1563565375-f3fdfdbefa83.jpg',
        'photo-1563805042-7684c019e1cb.jpg',
        'photo-1564489563601-c53cfc451e93.jpg',
        'photo-1565299507177-b0ac66763828.jpg',
        'photo-1565299543923-37dd37887442.jpg',
        'photo-1565299585323-38d6b0865b47.jpg',
        'photo-1565299624946-b28f40a0ae382.jpg',
        'photo-1565299715199-866c917206bb.jpg',
        'photo-1565958011703-44f9829ba187.jpg',
        'photo-1567620905732-2d1ec7ab7445.jpg',
        'photo-1568093858174-0f391ea21c45.jpg',
        'photo-1568376794508-ae52c6ab3929.jpg',
        'photo-1568600891621-50f697b9a1c7.jpg',
        'photo-1569718212165-3a8278d5f624.jpg',
        'photo-1570197571499-166b36435e9f.jpg',
        'photo-1570598912132-0ba1dc952b7d.jpg',
        'photo-1570700258112-e259d3dbafb4.jpg',
        'photo-1571091718767-18b5b1457add.jpg',
        'photo-1571575173700-afb9492e6a50.jpg',
        'photo-1571997478779-2adcbbe9ab2f.jpg',
        'photo-1572357176061-7c96fd2af22f.jpg',
        'photo-1572448862527-d3c904757de6.jpg',
        'photo-1572449043416-55f4685c9bb7.jpg',
        'photo-1574484184081-afea8a62f9c0.jpg',
        'photo-1574484284002-952d92456975.jpg',
        'photo-1576867757603-05b134ebc379.jpg',
        'photo-1577303935007-0d306ee638cf.jpg',
        'photo-1577805947697-89e18249d767.jpg',
        'photo-1578855691621-8a08ea00d1fb.jpg',
        'photo-1579113800032-c38bd7635818.jpg',
        'photo-1582472138480-e84227671cd4.jpg',
        'photo-1583927136633-7ecde5b23ac5.jpg',
        'photo-1584559582213-787a2953dcbe.jpg',
        'photo-1585238342024-78d387f4a707.jpg',
        'photo-1586511925558-a4c6376fe65f.jpg',
        'photo-1586511934875-5c5411eebf79.jpg',
        'photo-1587015566802-5dc157c901cf.jpg',
        'photo-1587049633312-d628ae50a8ae.jpg',
        'photo-1589010588553-46e8e7c21788.jpg',
        'photo-1589190086117-65899ee559c7.jpg',
        'photo-1589431683447-2c0abd8d99e2.jpg',
        'photo-1590004953392-5aba2e72269a.jpg',
        'photo-1590004987778-bece5c9adab6.jpg',
        'photo-1590005024862-6b67679a29fb.jpg',
        'photo-1590534247854-e97d5e3feef6.jpg',
        'photo-1590779033100-9f60a05a013d.jpg',
        'photo-1592417817098-8fd3d9eb14a5.jpg',
        'photo-1593584785033-9c7604d0863f.jpg',
        'photo-1593854823220-49d01bebbfdc.jpg',
        'photo-1593854823322-5a737e326b1c.jpg',
        'photo-1594212699903-ec8a3eca50f5.jpg',
        'photo-1594751504946-d77bac7c6a1a.jpg',
        'photo-1595855759920-86582396756a.jpg',
        'photo-1596662951482-0c4ba74a6df6.jpg',
        'photo-1599785209796-786432b228bc.jpg',
        'photo-1600335895229-6e75511892c8.jpg',
        'photo-1600803907087-f56d462fd26b.jpg',
        'photo-1601004890684-d8cbf643f5f2.jpg',
        'photo-1601585099780-6b176dc702af.jpg',
        'photo-1603105037880-880cd4edfb0d.jpg',
        'photo-1606149059549-6042addafc5a.jpg',
        'photo-1606755962773-d324e0a13086.jpg',
        'photo-1606756790138-261d2b21cd75.jpg',
        'photo-1606787366850-de6330128bfc.jpg',
        'photo-1607013251379-e6eecfffe234.jpg',
        'photo-1609501676725-7186f017a4b7.jpg',
        'photo-1609873539027-d4ad052cb6a7.jpg',
        'photo-1609951651467-713256d1a3be.jpg',
        'photo-1609951651556-5334e2706168.jpg',
        'photo-1610450949065-1f2841536c88.jpg',
        'photo-1612240498936-65f5101365d2.jpg',
        'photo-1613669146965-507d0e72a688.jpg',
        'photo-1614630536429-74e43f302c31.jpg',
        'photo-1618724980108-a4d3856fd8f5.jpg'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = Arr::random(self::$IMAGES,1)[0];
        $faker = \Faker\Factory::create();
        return [
            'name' => $faker->company(),
            'price'=>   1000 * $faker->numberBetween(10,100),
            'cycle_month'=>  $faker->numberBetween(1,12),
            'limit_month'=>  $faker->numberBetween(1,30),
            'description' => $faker->realTextBetween(100,200),
            'img' => 'menu/'.$image,
            'shop_id' => $faker->numberBetween(1,400),
        ];
    }
}


