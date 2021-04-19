echo "ADMIN:"
echo '$u = new \App\Models\User;$u->name = "admin";$u->email = "admin@test.com";$u->password = Hash::make("admin123");$u->token = hash("sha256", "admin123");$u->role = "admin";$u->firstname = "admin";$u->birthday = "2001-08-07"; $u->lastname1 = "example1";$u->lastname2 = "example2";$u->save();'
echo ''
echo 'USER:'
echo '$u = new \App\Models\User;$u->name = "test";$u->email = "test@test.com";$u->password = Hash::make("test123");$u->token = hash("sha256", "test123");$u->firstname = "test";$u->lastname1 = "example1";$u->lastname2 = "example2";$u->birthday = "2001-08-07"; $u->save();'
php artisan tinker
