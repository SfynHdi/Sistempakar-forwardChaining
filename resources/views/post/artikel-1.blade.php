@extends('post.master')

@section('article-title', 'Beberapa penyebab Hernia Nucleus Pulposus atau Saraf Terjepit')
@section('title', 'Beberapa penyebab Hernia Nucleus Pulposus atau Saraf Terjepit')

@section('article-image', asset('images/sakit_boyok (1).jpg'))

@section('article-body')
    <p>
        Saraf kejepit atau kecetit adalah suatu kondisi ketika saraf tertekan oleh jaringan tubuh di sekitarnya. Kondisi ini
        dapat terjadi ketika saraf tertekan di antara ligamen, tendon, atau tulang. Ketika Anda mengalami kondisi saraf
        terjepit, tubuh akan mengirimkan sinyal berupa rasa nyeri. Tentu sebaiknya Anda tidak mengabaikan tanda-tanda saraf
        kejepit, sebab kerusakan saraf bisa bertambah parah.
    </p>
    <p>
        Saraf terjepit dapat terjadi di bagian manapun di sekitar piringan sendi (diskus) dan tulang belakang. Namun, jenis
        saraf yang paling sering mengalami kondisi ini yaitu yang terletak di sekitar tulang punggung bagian bawah. Umumnya,
        rasa nyeri pertama dirasakan pada bagian tubuh tempat saraf yang terjepit. Namun, tidak menutup kemungkinan rasa nyeri
        dapat muncul di beberapa bagian tubuh lainnya.
    </p>
    <p>
        Kondisi ini disebut juga dengan hernia nukleus pulposus (HNP). Cairan yang bocor bisa menimbulkan tekanan pada saraf
        dan menyebabkan sensasi saraf terjepit.
    </p>
    <p>
        Ada beberapa faktor yang bisa memicu terjadinya saraf kejepit, yaitu sebagai berikut:
    </p>
    <ul>
        <li>Penuaan.</li>
        <li>Gerakan yang berulang, seperti menundukan atau memutar punggung bawah.</li>
        <li>Cedera, misalnya saat berolahraga atau mengangkat beban berat.</li>
        <li>Postur tubuh yang tidak baik.</li>
        <li>Berat badan berlebih atau obesitas.</li>
        <li>Kurang bergerak akibat gaya hidup tidak aktif.</li>
        <li>Kebiasaan merokok.</li>
    </ul>
@endsection
@section('sidebar')
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
    <div class="article-item">
        <img src="{{ asset('images/sakit_boyok (4).jpg') }}" alt="Article Image">
        <h4 class="article-title">Gerakan Peregangan untuk Mengatasi Nyeri Saraf Kejepit</h4>
        <a href="{{ url('post/artikel-4') }}" class="read-more">Baca Selengkapnya</a>
    </div>
@endsection
