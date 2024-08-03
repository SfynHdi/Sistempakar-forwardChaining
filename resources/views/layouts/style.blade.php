<style>
    /* Reset and basic styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Navbar styles */
    nav {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100px;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .navbar {
        display: flex;
        height: 100%;
        max-width: 90%;
        margin: auto;
    }

    .navbar .logo a {
        margin-top: 5px;
        margin-bottom: 25px;
    }

    .navbar .menu {
        display: flex;
        align-items: center;
    }

    .navbar .menu li {
        list-style: none;
        margin: 0 15px;
    }

    .navbar .menu li a {
        color: #000;
        font-size: 15px;
        font-weight: 300;
        text-decoration: none;
    }

    /* Custom button styles */
    .btn {
        text-decoration: none;
        font-size: 14px;
        padding: 10px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn.btn-outline-ungu {
        color: #7b00a0;
        border: 1px solid #7b00a0;
    }

    .btn.btn-ungu {
        background-color: #7b00a0;
        color: #fff;
        font-size: 16px;
    }

    .btn.btn-ungu:hover {
        background-color: #6c0089;
    }

    /* Typography styles */
    .lead {
        font-weight: 300;
    }

    .heading-bold {
        font-weight: 700;
        color: purple;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 700;
        color: purple;
    }

    .text-purple {
        font-weight: 700;
        color: purple;
    }

    /* Layout and Content Styles */
    .content {
        padding-top: 100px;
    }

    .cek-diagnosa,
    .daftar-penyakit,
    .tentang-aplikasi,
    .artikel,
    #pengertian-hnp {
        margin: 75px;
        display: flex;
        align-items: center;
        max-width: 90%;
        max-height: 90%;
        justify-content: center;
        text-align: left;
    }

    .cek-diagnosa .row,
    .daftar-penyakit .row,
    .tentang-aplikasi .row,
    #pengertian-hnp .row {
        margin-bottom: 50px;
    }

    .cek-diagnosa img,
    .daftar-penyakit img,
    #pengertian-hnp img {
        margin-top: 20px;
    }

    .highlight {
        font-weight: 700;
    }

    .btn-read-more {
        color: #6c2eb9;
        background-color: #e1d4f2;
    }

    /* Footer Styles */
    .footer {
        background-color: #f8f9fa;
        padding: 10px 0;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .footer-logo img {
        max-width: 150px;
        filter: grayscale(100%);
    }

    .footer-text {
        flex-grow: 1;
        text-align: right;
        margin-left: auto;
    }

    .footer-text .copyright {
        margin: 0;
        font-size: 14px;
        color: #6c757d;
    }

    /* Sidebar Styles */
    .sidebar h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .sidebar .article-item {
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #ddd;
    }

    .sidebar .article-item img {
        width: 80%;
        height: auto;
        border-radius: 4px;
    }

    .sidebar .article-item .article-title {
        font-size: 1.1rem;
        margin: 0.5rem 0;
    }

    .sidebar .article-item .read-more {
        font-size: 0.9rem;
        color: #6c2eb9;
        text-decoration: none;
    }

    .sidebar .article-item .read-more:hover {
        text-decoration: underline;
    }

    /* Custom card styles */
    .card-custom {
        display: flex;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 100%;
    }

    .card-custom img {
        width: 40%;
        object-fit: cover;
    }

    .card-content {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #666;
        margin-bottom: 20px;
    }

    .card-button {
        padding: 10px 20px;
        font-size: 1rem;
        color: #007bff;
        border: 1px solid #007bff;
        border-radius: 8px;
        background-color: #fff;
        text-decoration: none;
        text-align: center;
        transition: background-color 0.3s, color 0.3s;
    }

    .card-button:hover {
        background-color: #007bff;
        color: #fff;
    }

    .artikel-hnp {
        margin-left: 75px;
        font-weight: 700;
        color: purple;
    }

    /* Additional Styles */



    /* Mobile styles */
    @media (max-width: 768px) {
        nav {
            height: 80px;
        }

        .navbar {
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .navbar .logo a {
            margin: 10px 0;
        }

        .navbar .menu {
            flex-direction: column;
        }

        .navbar .menu li {
            margin: 10px 0;
        }

        .cek-diagnosa,
        .daftar-penyakit,
        .tentang-aplikasi,
        #pengertian-hnp {
            flex-direction: column;
            height: auto;
            margin: 20px;
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .card-custom {
            flex-direction: column;
        }

        .card-custom img {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 10px;
        }

        .heading-bold {
            margin-left: 0;
        }

        .artikel-hnp {
            margin-left: 0;
            margin-bottom: 0;
            /* Remove margin on mobile */
            padding-left: 29px;
            /* Apply padding if needed */
        }

    }
</style>
