<?php

namespace Database\Seeders;

use App\Http\Controllers\VacationController;
use App\Models\Company;
use App\Models\Companytype;
use App\Models\Department;
use App\Models\Room;
use App\Models\Salary;
use App\Models\User;
use App\Models\Vacation;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //USUARIOS
        echo 'Crear usuario Maria ---------';
        User::factory()->create([
        //User::factory()->create([
            'cif' => '53303160Q',
            'name' => 'María Castro Juíz',
            'email' => 'mariacjuiz@gmail.com',
            'password' => 'maria1234',
            'adress' => 'Juan Diaz Porlier, 17, 4R',
            'phone' => '654654654',
            'photo' => 'id2.jpg',
            'department' => '1'
        ]);
        echo 'Crear total 20 registros';
        //Número de registroa que vamos a crear
        User::factory(20)->create();

        //DEPARTAMENTOS
        echo 'Crear departamentos ---------';
        Department::factory()->create([
            'name' => 'Recursos Humanos',
            'user_id' => '1',
        ]);
        Department::factory()->create([
            'name' => 'Informática',
            'user_id' => '2',
        ]);
        Department::factory()->create([
            'name' => 'Dirección',
            'user_id' => '3',
        ]);
        Department::factory()->create([
            'name' => 'Administración',
            'user_id' => '4',
        ]);
        Department::factory()->create([
            'name' => 'Ventas',
            'user_id' => '5',
        ]);
        Department::factory()->create([
            'name' => 'Logística',
            'user_id' => '6',
        ]);

        //TIPOS DE NOTICIAS
        echo 'Crear Tipos de noticias ---------';
        Companytype::factory()->create([
            'name' => 'Noticias',
        ]);
        Companytype::factory()->create([
            'name' => 'Eventos',
        ]);
        Companytype::factory()->create([
            'name' => 'Promociones internas',
        ]);
        Companytype::factory()->create([
            'name' => 'Cursos',
        ]);

         //CREAR NOTICIAS DE LA COMPAÑÍA
        echo 'Crear 1 Noticia ---------';
        Company::factory()->create([
            'ctype_id' => '1',
            'title' => 'Compañía lider en el sector',
            'text' => 'Es el momento de cambiar las prioridades de las compañías: no hay que centrarse solo en la generación de beneficio, sino que es necesario tener en cuenta qué se aporta a la sociedad. Con esta idea de la directora general de la Fundación SERES, Ana Sainz, se inició este miércoles una sesión, organizada conjuntamente entre la citada institución y Esade, sobre Liderar desde el propósito, y en la que participaron varias empresas que desde hace tiempo aplican este modelo de liderazgo. De hecho, el líder, en opinión de Sainz, debe apostar por este nuevo modelo que combina el crecimiento social y el económico, ya que “apostar por una sociedad mas justa es una oportunidad para todos”',
            'link' => 'www.google.es',
            'img' => 'https://d500.epimg.net/cincodias/imagenes/2021/01/30/fortunas/1611966582_769932_1611967774_miniatura_normal.jpg',
            'enabled' => true,
        ]);
        echo 'Crear resto de las noticias ---------';
        Company::factory(15)->create();

        //CREAR SALAS DE REUNIONES
        echo 'Crear salas de reunuones ---------';
        Room::factory(8)->create();

        //TIPOS DE HORAS
        echo 'Crear Tipos de horas de ausencias ---------';
        Companytype::factory()->create([
            'name' => 'Ausencia médica',
        ]);
        Companytype::factory()->create([
            'name' => 'Mudanza',
        ]);
        Companytype::factory()->create([
            'name' => 'Asuntos propios',
        ]);
        Companytype::factory()->create([
            'name' => 'Gestiones administrativas',
        ]);

        //NOMINAS
        echo 'Crear Nominas ---------';
        Salary::factory(200)->create();
    }
}


