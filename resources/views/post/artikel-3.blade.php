@extends('post.master')

@section('article-title', 'Langkah Mengatasi Saraf Kejepit dengan Fisioterapi')
@section('title', 'Langkah Mengatasi Saraf Kejepit dengan Fisioterapi')

@section('article-image', asset('images/sakit_boyok (3).jpg'))

@section('article-body')
    <p>
        Saraf kejepit memiliki istilah medis lain, yaitu penyakit hernia nukleus pulposus (HNP). Penyakit ini terjadi saat bantalan ruas tulang belakang bergeser dan menekan saraf tulang belakang. Jika terjadi, seseorang yang mengalami kondisi ini akan ditandai dengan sejumlah gejala, seperti nyeri pinggang, sakit punggung bagian atas, atau nyeri leher. Rasa nyeri yang muncul tergantung lokasi terjadinya saraf kejepit.
    </p>
    <p>
        Dalam kasus yang ringan, saraf kejepit bisa sembuh dengan sendirinya. Namun jika terjadi selama berbulan-bulan lamanya, maka kamu harus menemukan langkah penanganan yang tepat, agar aktivitas harianmu tidak lagi terganggu. Lantas, bagaimana cara mengatasi saraf kejepit dengan fisioterapi? Langkah pertama yang dibutuhkan adalah keterlibatan peserta terapi secara aktif dan kedisiplinan yang diterapkan.
    </p>
    <p>
        Kedisiplinan yang dimaksud bukan hanya disiplin waktu dalam melakukan fisioterapi saja, tetapi juga mengubah gaya hidup menjadi lebih sehat untuk mempersingkat waktu kesembuhan. Berikut ini sejumlah metode yang dilakukan guna mengatasi saraf kejepit dengan fisioterapi:
    </p>
    <ol>
        <li>
            <strong>Program Pelatihan:</strong>
            Program pelatihan dilakukan dengan tujuan untuk memperbaiki postur tubuh, memperkuat otot, senam atau olahraga, dan peregangan otot.
        </li>
        <li>
            <strong>Teknik Elektroterapi:</strong>
            Teknik elektroterapi dilakukan dengan bantuan aliran listrik. Jenisnya sendiri dibedakan menjadi beberapa macam, yaitu:
            <ul>
                <li>Terapi saraf dengan stimulasi elektrik (TEN).</li>
                <li>Terapi stimulasi listrik melalui jaringan lemak (PENS).</li>
                <li>Metode PENS yang menggabungkan teknik akupuntur dan terapi listrik.</li>
            </ul>
        </li>
        <li>
            <strong>Fisioterapi Manual:</strong>
            Fisioterapi manual dilakukan dengan memijat, latihan peregangan, serta mobilisasi sendi. Langkah ini bertujuan untuk membantu relaksasi, mengurangi nyeri, serta meningkatkan fleksibilitas anggota gerak tubuh yang mengalami saraf kejepit.
        </li>
        <li>
            <strong>Terapi Okupasi:</strong>
            Terapi okupasi disebut juga dengan occupational therapy. Tujuannya adalah membantu seseorang yang memiliki keterbatasan fisik, sensorik, atau kognitif agar dapat menjalani aktivitas sehari-hari dengan baik.
        </li>
    </ol>
    <p>
        Itulah beberapa prosedur fisioterapi untuk mengatasi masalah saraf terjepit. Untuk lebih jelasnya mengenai hal-hal apa yang harus dilakukan sebelum, selama, dan sesudah prosedur, kamu bisa bertanya langsung dengan dokter di aplikasi Halodoc, ya!
    </p>
    <p>
        Selain beberapa metode yang telah disebutkan, pengidap saraf kejepit dapat mengatasi masalah kesehatan yang dialami dengan hidroterapi, terapi ultrasound, terapi suhu (panas atau dingin), latihan pernapasan, dan akupuntur. Semua langkah penanganan yang dilakukan akan tergantung dari penyebab dan intensitas gejala yang muncul.
    </p>
    <p>
        Kamu juga dapat mengatasi saraf kejepit dengan fisioterapi yang dilakukan di rumah. Namun, jangan lupa untuk meminta saran terapis untuk menilai kondisi tubuhmu, agar jenis dan frekuensi yang dilakukan tidak keliru. Intinya, mengatasi saraf kejepit dengan fisioterapi dilakukan dengan mengajarkan peregangan atau penguatan otot-otot di area saraf terjepit. Tujuannya adalah untuk mengurangi tekanan pada saraf serta mengembalikan fungsi fisik seperti semula.
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
        <img src="{{ asset('images/sakit_boyok (4).jpg') }}" alt="Article Image">
        <h4 class="article-title">Gerakan Peregangan untuk Mengatasi Nyeri Saraf Kejepit</h4>
        <a href="{{ url('post/artikel-4') }}" class="read-more">Baca Selengkapnya</a>
    </div>
@endsection
