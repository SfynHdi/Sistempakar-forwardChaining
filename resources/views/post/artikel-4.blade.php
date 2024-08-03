@extends('post.master')

@section('article-title', 'Gerakan Peregangan untuk Mengatasi Nyeri Saraf Kejepit')
@section('title', 'Gerakan Peregangan untuk Mengatasi Nyeri Saraf Kejepit')

@section('article-image', asset('images/sakit_boyok (4).jpg'))

@section('article-body')
    <p>
        Sciatica adalah rasa nyeri akibat saraf yang rusak atau terjepit. Sciatica sering terjadi pada orang lanjut usia, yang memiliki penyakit diabetes kronis dan kegemukan. Namun, rasa nyeri akibat sciatica bisa diredakan dengan melakukan peregangan. Berikut berbagai gerakan peregangan untuk mengatasi nyeri saraf kejepit atau sciatica.
    </p>
    <p>
        Sciatica adalah gejala dari penyakit saraf dan biasanya menghilang setelah 4-8 minggu perawatan. Nyeri saraf kejepit atau sciatica bisa sangat menyiksa dan membuat tubuh Anda lemah sehingga Anda bahkan tidak ingin turun dari tempat tidur atau sofa. Penyebab sciatica biasanya piringan sendi yang menonjol dan menekan langsung ke saraf, penyempitan kanal tulang belakang (stenosis tulang belakang), dan cedera.
    </p>
    <p>
        Ahli terapi fisik, Mindy Marantz, mengatakan bahwa nyeri panggul dapat terjadi karena berbagai alasan. Mengetahui bagian tubuh mana yang sulit untuk digerakkan adalah langkah pertama untuk mengatasi sciatica. Seringkali, bagian tubuh yang paling bermasalah adalah punggung bawah dan pinggul. Cara terbaik mengatasi nyeri saraf kejepit atau sciatica adalah dengan melakukan peregangan, yang dapat mengurangi rasa sakit dan nyeri pinggul.
    </p>
    <p>
        Berikut adalah enam gerakan peregangan untuk mengatasi sciatica:
    </p>
    <ol>
        <li>
            <strong>Peregangan lutut ke dada:</strong>
            Berbaring terlentang dan perlahan tarik lutut kanan ke arah dada. Pegang posisi selama 30 detik. Ulangi gerakan ini untuk kaki kiri. Lakukan beberapa set untuk masing-masing kaki.
        </li>
        <li>
            <strong>Peregangan piramida:</strong>
            Berdiri dengan kaki terbuka lebar. Bungkukkan badan ke depan dan coba sentuh lantai dengan tangan. Pegang posisi selama 30 detik. Ulangi gerakan ini beberapa kali.
        </li>
        <li>
            <strong>Peregangan lutut silang:</strong>
            Berbaring terlentang, angkat kaki kanan dan silangkan di atas paha kiri. Tahan posisi selama 30 detik. Ulangi gerakan untuk kaki kiri.
        </li>
        <li>
            <strong>Peregangan panggul:</strong>
            Berbaring terlentang, tekuk lutut dan posisikan kaki flat di lantai. Perlahan gerakkan lutut ke arah berlawanan. Tahan posisi selama 30 detik. Ulangi gerakan untuk sisi lainnya.
        </li>
        <li>
            <strong>Peregangan punggung:</strong>
            Berbaring terlentang, tekuk lutut dan posisikan kaki flat di lantai. Pelan-pelan ayunkan lutut ke kiri, lalu ke kanan. Tahan setiap sisi selama 30 detik.
        </li>
        <li>
            <strong>Peregangan panggul dan pinggul:</strong>
            Berbaring terlentang, tekuk lutut dan tarik lutut kanan ke arah dada. Tahan selama 30 detik. Ulangi gerakan untuk kaki kiri.
        </li>
    </ol>
    <p>
        Lakukan gerakan peregangan ini secara rutin untuk membantu mengurangi rasa sakit akibat sciatica. Jika nyeri berlanjut, konsultasikan dengan dokter Anda.
    </p>
@endsection
@section('sidebar')
    <div class="article-item">
        <img src="{{ asset('images/sakit_boyok (1).jpg') }}" alt="Article Image">
        <h4 class="article-title">Beberapa penyebab Hernia Nucleus Pulposus atau Saraf Terjepit</h4>
        <a href="{{ url('post/artikel-1') }}" class="read-more">Baca Selengkapnya</a>
    </div>
    <div class="article-item">
        <img src="{{ asset('images/sakit_boyok (2).jpg') }}" alt="Article Image">
        <h4 class="article-title">Kiat Mencegah Saraf Terjepit</h4>
        <a href="{{ url('post/artikel-2') }}" class="read-more">Baca Selengkapnya</a>
    </div>
    <div class="article-item">
        <img src="{{ asset('images/sakit_boyok (3).jpg') }}" alt="Article Image">
        <h4 class="article-title">Langkah Mengatasi Saraf Kejepit dengan Fisioterapi</h4>
        <a href="{{ url('post/artikel-3') }}" class="read-more">Baca Selengkapnya</a>
    </div>
@endsection

