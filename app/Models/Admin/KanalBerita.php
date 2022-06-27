<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class KanalBerita extends Model
{
    use HasFactory;

    protected $table = 'berita_kanals';

    protected $fillable = [
        'id',
        'name',
        'creatorid',
        'createdby',
        'modifiedby',
        'modifierid',
        'created_at',
        'updated_at'
    ];


    // public $timestamps = false;


    public function getMainKanalBerita()
    {
        $data = DB::select("
        SELECT
        a.`id`,
        a.`name`,
        a.slug AS 'kanal_slug',
        ( SELECT id FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS id_berita,
        ( SELECT title FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS title,
        ( SELECT `desc` FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS `desc`,
        ( SELECT slug FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS slug,
        ( SELECT img_raw FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS img_raw,
        ( SELECT img_thumb FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS img_thumb,
        ( SELECT hit FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS hit,
        ( SELECT publish_date FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS publish_date,
        ( SELECT created_at FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS created_at
    FROM
        berita_kanals a
    WHERE
        ( SELECT count( id ) FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ) > 0
    ORDER BY
        ( SELECT sum( hit ) FROM beritas xx WHERE published = 'yes' AND xx.berita_kanal_id = a.id ) DESC
        ");
        return $data;
    }




    public function getMainKanalBeritaByUnorOPd($unor)
    {

        $data = DB::select("
        SELECT
        a.`id`,
        a.`name`,
        a.slug AS 'kanal_slug',
        ( SELECT id FROM beritas xx WHERE xx.unor = '$unor' AND xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS id_berita,
        ( SELECT title FROM beritas xx WHERE xx.unor = '$unor' AND  xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS title,
        ( SELECT `desc` FROM beritas xx WHERE xx.unor = '$unor' AND xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS `desc`,
        ( SELECT slug FROM beritas xx WHERE xx.unor = '$unor' AND  xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS slug,
        ( SELECT img_raw FROM beritas xx WHERE xx.unor = '$unor' AND  xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS img_raw,
        ( SELECT img_thumb FROM beritas xx WHERE xx.unor = '$unor' AND  xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS img_thumb,
        ( SELECT hit FROM beritas xx WHERE xx.unor = '$unor' AND  xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS hit,
        ( SELECT publish_date FROM beritas xx  WHERE xx.unor = '$unor' AND  xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS publish_date,
        ( SELECT created_at FROM beritas xx WHERE xx.unor = '$unor' AND  xx.published = 'yes' AND xx.berita_kanal_id = a.id ORDER BY created_at DESC LIMIT 1 ) AS created_at
    FROM
        berita_kanals a
    WHERE
        ( SELECT count( id ) FROM beritas xx WHERE xx.unor = '$unor' AND xx.published = 'yes' AND xx.berita_kanal_id = a.id ) > 0
    ORDER BY
        ( SELECT sum( hit ) FROM beritas xx WHERE xx.unor = '$unor' AND  xx.published = 'yes' AND xx.berita_kanal_id = a.id ) DESC
        ");



        return $data;
    }



    // public function getMainKanalBeritaBackup()
    // {
    //     $data = DB::select("
    //         SELECT
    //             a.*,
    //             a.slug as 'kanal_slug',
    //             b.id AS id_berita,
    //             b.title,
    //             b.desc,
    //             b.slug,
    //             b.img_raw,
    //             b.img_thumb,
    //             b.hit,
    //             b.publish_date,
    //             b.created_at
    //         FROM
    //             berita_kanals a
    //         JOIN
    //             (SELECT * FROM beritas WHERE published = 'yes' ORDER BY created_at DESC) b
    //             ON a.id = b.berita_kanal_id
    //         GROUP BY a.id
    //         ORDER BY b.created_at DESC, a.created_at DESC
    //     ");
    //     return $data;
    // }

    // public $timestamps = false;




    public function getMainKanalBeritaFoto()
    {
        $data = DB::select("
            SELECT
                a.*,
                a.slug as 'kanal_slug',
                b.id AS id_berita,
                b.title,
                b.desc,
                b.slug,
                b.img_raw,
                b.img_thumb,
                b.img_raw_nya,
                b.img_thumb_nya,
                b.slug_nya,
                b.hit,
                b.publish_date,
                b.created_at,
                b.jml_fotos
            FROM
                berita_kanals a
            JOIN
                (SELECT aa.*,
                    (SELECT d.img_raw FROM beritafoto_items as d WHERE d.beritafotos_id = aa.id and d.is_utama = 'yes' limit 1) as img_raw_nya,
                    (SELECT e.img_thumb FROM beritafoto_items as e WHERE e.beritafotos_id = aa.id and e.is_utama = 'yes' limit 1) as img_thumb_nya,
                    (SELECT f.slug FROM beritafoto_items as f WHERE f.beritafotos_id = aa.id and f.is_utama = 'yes' limit 1) as slug_nya
                    FROM beritafotos as aa
                WHERE published = 'yes' ORDER BY hit DESC) b
                ON a.id = b.berita_kanal_id
            GROUP BY a.id
            ORDER BY b.hit DESC, a.`name`
        ");
        return $data;
    }



    public function getMainKanalBeritaVideo()
    {
        $data = DB::select("
            SELECT
                a.*,
                a.slug as 'kanal_slug',
                b.id AS id_berita,
                b.title,
                b.desc,
                b.slug,
                b.img_raw,
                b.img_thumb,
                b.hit,
                b.publish_date,
                b.created_at
            FROM
                berita_kanals a
            JOIN
                (SELECT * FROM beritas WHERE is_berita_video = 'yes' and published = 'yes' ORDER BY hit DESC) b
                ON a.id = b.berita_kanal_id
            GROUP BY a.id
            ORDER BY b.hit DESC, a.`name`
        ");
        return $data;
    }






}
