<?php

use Illuminate\Database\Seeder;
use App\Follow;

class FollowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_total = 202;
        $followings_total = 21;
        for ($i=1; $i < $users_total; $i++) { 
            $this->follow($i, $i);

            if($i != 1){
                $this->follow($i, 1);
            }
            

            $n = floor($users_total / $followings_total);

            for ($j=1; $j <= $followings_total; $j++) { 


                $min = $n * $j;
                $max = ($n * ($j + 1)) -1;

                $this->follow($i, rand($min, $max));
            }
        }
    }

    private function follow($follower_id, $followed_id){
        $follow = new Follow();
        $follow->follower_id = $follower_id;
        $follow->followed_id = $followed_id;
        $follow->save();
    }
}
