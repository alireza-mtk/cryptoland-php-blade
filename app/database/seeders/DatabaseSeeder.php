<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            [
                'id' => 1,
                'name'          => 'Admin',
                'slug'          => 'admin',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")

            ],
            [
                'id' => 2,
                'name'          => 'User',
                'slug'          => 'user',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]
        ]);



        DB::table('users')->insert([
            [
                'id' => 1,
                'role_id' => 1,
                'phone_number' => "09120000000",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id' => 2,
                'role_id' => 2,
                'phone_number' => "09127170120",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id' => 3,
                'role_id' => 2,
                'phone_number' => "09127170121",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id' => 4,
                'role_id' => 2,
                'phone_number' => "09127170122",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id' => 5,
                'role_id' => 2,
                'phone_number' => "09127170123",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id' => 6,
                'role_id' => 2,
                'phone_number' => "09127170126",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('settings')->insert([
            [
                'id'            => 1,
                'name'          => 'مبتکری',
                'email'          => 'kasebekhoob@gmail.com',
                'phone'          => '09127170126',
                'telephone'     => '0214443322',
                'address'          => 'تهرن/خ سعدی/ نبش کوچه مریم',
                'footer'          => 'تمامی حقوق این سایت محفوظ میباشد',
                'aboutus'          => 'ندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد',
                'instagram'          => 'http://127.0.0.1:8000/',
                'telegram'          => 'http://127.0.0.1:8000/',
                'whatsapp'          => 'http://127.0.0.1:8000/',
                'linkedin'          => 'http://127.0.0.1:8000/',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]
        ]);



        DB::table('job_groups')->insert([
            [
                'id'            => 1,
                'name'          => 'خانگی',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 2,
                'name'          => 'غذایی',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 3,
                'name'          => 'پوشاک',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 4,
                'name'          => 'تفریحی',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 5,
                'name'          => 'رفاهی',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 6,
                'name'          => 'میوه',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 7,
                'name'          => 'قهوه',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 8,
                'name'          => 'کتاب',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('rating_questions')->insert([
            [
                'id'            => 1,
                'question'      => 'آیا از این کاسب راضی بودید؟',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 2,
                'question'      => 'آیا از این کاسب راضی بودید؟',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 3,
                'question'      => 'آیا از این کاسب راضی بودید؟',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 4,
                'question'      => 'آیا از این کاسب راضی بودید؟',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 5,
                'question'      => 'آیا از این کاسب راضی بودید؟',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 6,
                'question'      => 'آیا از این کاسب راضی بودید؟',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 7,
                'question'      => 'آیا از این کاسب راضی بودید؟',
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]
        ]);


        DB::table('job_categories')->insert([
            [
                'id'            => 1,
                'name'          => 'ساخت و ساز',
                'job_group_id'  => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 2,
                'name'          => 'لوازم منزل',
                'job_group_id'  => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 3,
                'name'          => 'لوازم آشپزخانه',
                'job_group_id'  => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 4,
                'name'          => 'فرش',
                'job_group_id'  => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 5,
                'name'          => 'ساخت و ساز',
                'job_group_id'  => 2,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 6,
                'name'          => 'لوازم منزل',
                'job_group_id'  => 2,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 7,
                'name'          => 'لوازم آشپزخانه',
                'job_group_id'  => 2,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 8,
                'name'          => 'فرش',
                'job_group_id'  => 2,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ], [
                'id'            => 9,
                'name'          => 'ساخت و ساز',
                'job_group_id'  => 3,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 10,
                'name'          => 'لوازم منزل',
                'job_group_id'  => 3,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 11,
                'name'          => 'لوازم آشپزخانه',
                'job_group_id'  => 3,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 12,
                'name'          => 'فرش',
                'job_group_id'  => 3,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],

            [
                'id'            => 13,
                'name'          => 'ساخت و ساز',
                'job_group_id'  => 4,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 14,
                'name'          => 'لوازم منزل',
                'job_group_id'  => 4,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 15,
                'name'          => 'لوازم آشپزخانه',
                'job_group_id'  => 4,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 16,
                'name'          => 'فرش',
                'job_group_id'  => 4,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('plans')->insert([
            [
                'id'            => 1,
                'name'          => 'bronz',
                'duration'  => 30,
                'price'  => 10000,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 2,
                'name'          => 'silver',
                'duration'  => 60,
                'price'  => 20000,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 3,
                'name'          => 'gold',
                'duration'  => 90,
                'price'  => 30000,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ]
        ]);



        $this->call(ProvincesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);


        DB::table('jobs')->insert([
            [
                'id'            => 1,
                'job_category_id'      => 1,
                'user_id'      => 2,
                'city_id'      => 11,
                'title'      => "فروشگاه فرهمند",
                'instagram'      => "http://instagram.com",
                'whatsapp'      => "http://whatsapp.com",
                'facebook'      => "http://facebook.com",
                'tweeter'      => "http://tweeter.com",
                'website'      => "http://localhost:8000",
                'address'      => "تهرن/خ سعدی/ نبش کوچه مریم",
                'description'      => "لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.",
                'website'      => "http://localhost:8000",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 2,
                'job_category_id'      => 2,
                'user_id'      => 3,
                'city_id'      => 9,
                'title'      => "فروشگاه احمدوند",
                'instagram'      => "http://instagram.com",
                'whatsapp'      => "http://whatsapp.com",
                'facebook'      => "http://facebook.com",
                'tweeter'      => "http://tweeter.com",
                'website'      => "http://localhost:8000",
                'address'      => "تهرن/خ سعدی/ نبش کوچه مریم",
                'description'      => "لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.",
                'website'      => "http://localhost:8000",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 3,
                'job_category_id'      => 3,
                'user_id'      => 4,
                'city_id'      => 45,
                'title'      => "فروشگاه نادری",
                'instagram'      => "http://instagram.com",
                'whatsapp'      => "http://whatsapp.com",
                'facebook'      => "http://facebook.com",
                'tweeter'      => "http://tweeter.com",
                'website'      => "http://localhost:8000",
                'address'      => "تهرن/خ سعدی/ نبش کوچه مریم",
                'description'      => "لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.",
                'website'      => "http://localhost:8000",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 4,
                'job_category_id'      => 4,
                'user_id'      => 5,
                'city_id'      => 30,
                'title'      => "فروشگاه موسی",
                'instagram'      => "http://instagram.com",
                'whatsapp'      => "http://whatsapp.com",
                'facebook'      => "http://facebook.com",
                'tweeter'      => "http://tweeter.com",
                'website'      => "http://localhost:8000",
                'address'      => "تهرن/خ سعدی/ نبش کوچه مریم",
                'description'      => "لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.",
                'website'      => "http://localhost:8000",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 5,
                'job_category_id'      => 5,
                'user_id'      => 6,
                'city_id'      => 50,
                'title'      => "فروشگاه عیسی",
                'instagram'      => "http://instagram.com",
                'whatsapp'      => "http://whatsapp.com",
                'facebook'      => "http://facebook.com",
                'tweeter'      => "http://tweeter.com",
                'website'      => "http://localhost:8000",
                'address'      => "تهرن/خ سعدی/ نبش کوچه مریم",
                'description'      => "لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد. معمولا طراحان گرافیک برای صفحه‌آرایی، نخست از متن‌های آزمایشی و بی‌معنی استفاده می‌کنند تا صرفا به مشتری یا صاحب کار خود نشان دهند که صفحه طراحی یا صفحه بندی شده بعد از اینکه متن در آن قرار گیرد چگونه به نظر می‌رسد و قلم‌ها و اندازه‌بندی‌ها چگونه در نظر گرفته شده‌است. از آنجایی که طراحان عموما نویسنده متن نیستند و وظیفه رعایت حق تکثیر متون را ندارند و در همان حال کار آنها به نوعی وابسته به متن می‌باشد آنها با استفاده از محتویات ساختگی، صفحه گرافیکی خود را صفحه‌آرایی می‌کنند تا مرحله طراحی و صفحه‌بندی را به پایان برند.",
                'website'      => "http://localhost:8000",
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            ],
        ]);



        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(ImageGalleriesTableSeeder::class);
        $this->call(PostTagTableSeeder::class);
        $this->call(CategoryPostTableSeeder::class);
    }
}
