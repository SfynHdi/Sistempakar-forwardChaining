@extends('post.master')

@section('article-title', 'Kiat Mencegah Saraf Terjepit')
@section('title', 'Kiat Mencegah Saraf Terjepit')

@section('article-image', asset('images/sakit_boyok (2).jpg'))

@section('article-body')
    <p>
        Saraf terjepit (Herniated Nucleus Pulposus/HNP) adalah keadaan di mana terjadi tekanan berlebih pada syaraf oleh jaringan sekitarnya. Jaringan sekitar yang bisa menekan syaraf secara berlebihan dapat berupa jaringan otot, tendon, tulang, atau tulang rawan. Karena syaraf menjalar sepanjang tubuh, maka syaraf kejepit bisa terjadi di beberapa lokasi dalam tubuh. Kondisi ini bisa menyebabkan rasa sakit, kebas, kesemutan, dan lemah fisik.
    </p>
    <p>
        Beberapa gejala saraf terjepit antara lain mati rasa di bagian tubuh yang memiliki banyak saraf, rasa sakit atau nyeri seperti terbakar yang menjalar keluar, rasa seperti ditusuk jarum. Di samping itu ada beberapa gejala lain yang bervariasi tingkat nyeri dan mati rasanya karena gejala ini dapat muncul terus menerus atau timbul tenggelam.
    </p>
    <p>
        Ada banyak faktor yang menyebabkan saraf terjepit, antara lain karena cidera, rematik, stres dari pekerjaan, posisi tubuh yang salah saat duduk terlalu lama, berat badan yang berlebih yang menekan saraf.
    </p>
    <p>
        Kita bisa mencegah terjadinya saraf terjepit dengan hal-hal berikut:
    </p>
    <ol>
        <li>
            <strong>Posisi tubuh yang benar:</strong>
            Bagi pekerja kantoran, seringkali harus duduk lama di depan komputer dengan posisi yang sama. Posisi ini harus diperhatikan dengan benar, tidak bungkuk tetapi duduk tegak. Lalu ketika tidur, gunakan bantal kepala yang tepat serta menggunakan kasur yang rata/ mengikuti lekuk tulang belakang.
        </li>
        <li>
            <strong>Hindari mengangkat beban dengan membungkuk:</strong>
            Beberapa kasus saraf terjepit disebabkan oleh mengangkat beban dengan membungkuk, misalnya memasang galon ke dispenser, atau menggendong anak. Mulailah dengan berjongkok dalam posisi tegak lalu berdiri perlahan.
        </li>
        <li>
            <strong>Olahraga teratur:</strong>
            Berolahraga secara teratur sangat membantu menjaga kondisi tubuh, termasuk tulang, otot dan persendian tetap prima. Namun perlu diperhatikan bentuk olahraga yang dipillih bukan olahraga berat atau berisiko tinggi menimbulkan cidera.
        </li>
        <li>
            <strong>Nutrisi yang cukup:</strong>
            Semakin bertambah usia, manusia akan mengalami pengeroposan tulang (osteoporosis), gangguan persendian dan saraf. Sangat dianjurkan untuk menjaga asupan kalsium, vitamin B kompleks, dan mineral untuk menutrisi tulang, sendi, dan saraf.
        </li>
    </ol>
    <p>
        Seseorang mungkin saja terkena saraf terjepit meski memiliki pola hidup sehat, namun dampak dari penyakit tersebut dapat diminimalisir sehingga pemulihan dapat terjadi dengan lebih baik tanpa harus mengambil penyembuhan yang invasif seperti pembedahan. Kenali gejalanya agar terhindar dari risikonya.
    </p>
@endsection
@section('sidebar')
    <div class="article-item">
        <img src="{{ asset('images/sakit_boyok (1).jpg') }}" alt="Article Image">
        <h4 class="article-title">Beberapa penyebab Hernia Nucleus Pulposus atau Saraf Terjepit</h4>
        <a href="{{ url('post/artikel-1') }}" class="read-more">Baca Selengkapnya</a>
    </div>
    <div class="article-item">
        <img src="{{ asset('images/sakit_boyok (3).jpg') }}" alt="Article Image">
        <h4 class="article-title">Langkah Mengatasi Saraf Kejepit dengan Fisioterapi</h4>
        <a href="{{ url('post/artikel-3') }}" class="read-more">Baca Selengkapnya</a>
    </div>
    <div class="article-item">
        <img src="{{ asset('images/sakit_boyok (4).jpg') }}" alt="Article Image">
        <h4 class="article-title">Gerakan Peregangan untuk Mengatasi Nyeri Saraf Kejepit</h4>
        <a href="{{ url('post/artikel-4') }}" class="read-more">Baca Selengkapnya</a>
    </div>
@endsection
