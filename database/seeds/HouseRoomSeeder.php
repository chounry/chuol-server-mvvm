<?php

use Illuminate\Database\Seeder;

use App\House;
use App\User;
use App\Room;
use App\Estate;
use App\EstateImg;
use App\HouseType;
use App\UserType;

class HouseRoomSeeder extends Seeder
{
/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'fname' => 'Jonh',
            'lname' => 'Nathon',
            'phone' => '073994913',
            'password' => \bcrypt('123456'),
            'email' => Str::random(5).'@gmail.com',
            'user_type_id' => UserType::all()[1]->id,
        ]);       

        // House
        for($i = 0;$i < 10; $i++){
            $est = Estate::create([
                'title' => Str::random(10),
                'price' => rand(1000, 999999) . '.' . rand(0, 99),
                'description' => Str::random(100),
                'phone' => '098384757',
                'address' => Str::random(30),
                'date' => rand(2015, 2019) . '-' . rand(1,12) . '-' . rand(1, 28),
                'lat' => 11,
                'lng' => 10,
                'accepted' => 1,
                'publish' => 1,
                'currency' => 'US',
                'duration' => '15',
                'city_id' => 1,
                'user_id' => $user->id
            ]);

            $houseTypes = HouseType::all();
            House::create([
                'estate_id' => $est->id,
                'bedroom' =>  rand(1, 5),
                'bathroom' => rand(1,5),
                'floor' => rand(1,3),
                'house_size' => rand(5,20) . ' x ' . rand(5,20),
                'yard_size' =>  rand(5,20) . ' x ' . rand(5,20),
                'for_sale_status' => rand(1,2) == 1 ? 'sale' : 'rent',
                'house_type_id' => $houseTypes[rand(0, count($houseTypes) - 1)]->id
            ]);

            $numOfImg = rand(2, 10);
            for($k = 0;$k < $numOfImg;$k++){
                $index = 
                EstateImg::create([
                    'estate_id' => $est->id,
                    'img_loc' => '/storage/estate_imgs/default_estate_' . rand(1, 25) 
                ]);
            }
        }


        // Room
        for($j = 0; $j < 10;$j++){
            $est = Estate::create([
                'title' => Str::random(10),
                'price' => rand(40, 500) . '.0',
                'description' => Str::random(100),
                'phone' => '098384757',
                'address' => Str::random(30),
                'date' => rand(2015, 2019) . '-' . rand(1,12) . '-' . rand(1, 28),
                'lat' => 11,
                'lng' => 10,
                'accepted' => 1,
                'publish' => 1,
                'currency' => 'US',
                'duration' => '15',
                'city_id' => 1,
                'user_id' => $user->id
            ]);

            Room::create([
                'estate_id' => $est->id,
                'size' =>  rand(1, 5) . ' x ' . rand(1, 5),
                'free_wifi' => rand(0,1),
                'parking_space_available' => rand(0, 1),
                'AC' => rand(0, 1)
            ]);

            $numOfImg = rand(2, 10);
            for($q = 0;$q < $numOfImg;$q++){
                $index = 
                EstateImg::create([
                    'estate_id' => $est->id,
                    'img_loc' => '/storage/estate_imgs/default_estate_' . rand(1, 25) 
                ]);
            }
        }
    }
}
