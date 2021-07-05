@extends('MasterWebsite')
@section('contentWebsite')
    
          <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row mt-5">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h1 id="ngodingBareng">Ngoding<strong> Bareng</strong></h1>
                        <p><strong> Masih bingung mau mulai dari mana ? Jangan Khawatir, Kita belajar dari Nol yuk, bersama para mentor yang berpengalaman di bidang nya, Mau membangun karir sebagai seorang programer ? Yuk Ikuti kelas nya.</strong></p>
                        <a href="#about" class="btn btn-outline-light mb-5"><i class="fas fa-search"></i> Cari Kelas</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.8s after 0.6s">
                        <div class="card-header bg-white rounded-3">
                            <h4 class="text-dark text-center mb-3 pt-2">Daftar</h4>
                            <div class="card-body text-dark bg-white rounded border-top">
                                <form>
                                    <div class="input-group mb-3">
                                        <span class="nama bg-dark text-white p-3 rounded-left" id="nama"><i class="fas fa-user"></i></span>
                                        <input type="text" class="form-control p-4" name="nama" id="nama" placeholder="Username" aria-label="Username" aria-describedby="nama">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="email bg-dark text-white p-3 rounded-left" id="email"><i class="fas fa-at"></i></span>
                                        <input type="email" class="form-control  p-4" name="email" id="email" placeholder="Email" aria-label="email" aria-describedby="email">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="password bg-dark text-white p-3 rounded-left" id="password"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control  p-4" name="password" id="password" placeholder="Password" aria-label="password" aria-describedby="password">
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-large btn-block btn-outline-primary">Buat Akun</button>
                                    </div>
                                  </form>
                            </div>
                        </div>
                        {{-- <img src="{{asset('Template-Website/assets/images/slider-icon.png')}}" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic"> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="{{asset('Template-Website/assets/images/left-image.png')}}" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
                    <div class="left-heading">
                        <h5>Temukan Kelas Favoritmu dan Upload Hasil Karyamu</h5>
                    </div>
                    <div class="left-text">
                        <p>Setelah kamu belajar di kelas yang kamu pelajari,  Di sini <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a>, kamu bisa meng upload hasil karyamu.<br><br>
                        <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a> sudah bekerja sama dengan berbagai perusahaan IT. Upload karyamu sebagai CV.</p>
                        <a href="#contact-us" class="main-button">Lihat Karya</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Big Item Start ***** -->
    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-5 col-md-12 col-sm-12 mobile-bottom-fix">
                    <div class="left-heading">
                        <h5>Kalau Kamu Punya Keahlian di Bidang IT, Kamu Juga Bisa Jadi Mentor Loh</h5>
                    </div>
                    <p>Bagaimana caranya menjadi mentor <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a> ?</p>
                    <ul>
                        <li>
                            <img src="{{asset('Template-Website/assets/images/about-icon-01.png')}}" alt="">
                            <div class="text">
                                <h6>Pastinya Kamu Harus Mempunyai Kemampuan di bidang IT</h6>
                                <p>Untuk menjadi seorang mentor kamu harus menguasai bidang yang ingin kamu ajrkan nantinya.</p>
                            </div>
                        </li>
                        <li>
                            <img src="{{asset('Template-Website/assets/images/about-icon-03.png')}}" alt="">
                            <div class="text">
                                <h6>Mengirim Berkas CV</h6>
                                <p>Semakin lengkap berkas kamu semakin besar kamu berpeluang untuk menjadi mentor <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a></p>
                            </div>
                        </li>
                        <li>
                            <img src="{{asset('Template-Website/assets/images/about-icon-02.png')}}" alt="">
                            <div class="text">
                                <h6>Proses Verifikasi</h6>
                                <p>Admin akan memproses data kamu, Jika kamu di terima, Akan ada pemberitahuan di akun  <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a> kamu.</p>
                            </div>
                        </li>
                        <li>
                            <a href="#about2" class="main-button">Daftar Jadi Mentor</a>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-7 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="{{asset('Template-Website/assets/images/right-image.png')}}" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Big Item End ***** -->


    <!-- ***** Features Small Start ***** -->
    <section class="section" id="services">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="mb-5 text-white">
                        <img src="{{asset('Pavicon/blackboard.png')}}" width="70" alt="">  Daftar Kelas
                    </h1>
                </div>
                <div class="owl-carousel owl-theme" style="position: relative">
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="{{asset('Template-Website/assets/images/service-icon-01.png')}}" alt=""></i>
                        </div>
                        <span style="font-size: 13px">Mentor</span>
                        <p class="service-title">Yegi Candra Monanza</p>
                        <h5>Belajar HTML 5 Dasar</h5>
                        <a href="#" class="main-button">Ikuti Kelas</a>
                    </div>
                    <div class="item service-item">
                        <div class="icon">
                            <i><img src="{{asset('Template-Website/assets/images/service-icon-01.png')}}" alt=""></i>
                        </div>
                        <span style="font-size: 13px">Mentor</span>
                        <p class="service-title">Candra Monanza</p>
                        <h3>Belajar HTML 5 Dasar
                            dwd
                        </h3>
                        <a href="#" class="main-button">Ikuti Kelas</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Features Small End ***** -->


    <!-- ***** Frequently Question Start ***** -->
    <section class="section" id="frequently-question">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Pertanyaan yang Sering Diajukan</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="section-heading">
                        <p>Yang kami tampilkan adalah pertanyaan yang sering di ajukan oleh teman teman, Apakah kamu juga ingin bertanya ? <a href="#pertanyaan" class="btn btn-link">Klik Disini</a>
                        
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <div class="left-text col-lg-6 col-md-6 col-sm-12">
                    <h5>Tentang <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a> </h5>
                    <div class="accordion-text">
                        <p><a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a> adalah sebuah website pembelajaran bagi teman teman yang ingin menambah wawasan/ilmu tentang dunia programing, disini kita bisa berdiskusi dan mempelajari pelajaran secara road map/ alur pembelajaran, sehingga teman teman tidak bingung harus mulai dari mana.</p>
                        <br>
                        <p>Selain belajar, teman teman juga bisa mengajar/ menjadi mentor dengan kualifikasi teman teman kompeten di bidang program yang teman teman kuasai, untuk menjadi mentor tentunya ada tahapan tahapan yang harus di lalui</p>
                        <br>
                        <p><a href=""><i class="fas fa-laptop-code"></i>Ngobar</a> di dirikan di Tangerang, 2 Juli 2021, oleh Yegi Candra Monanza, tentunya dengan adanya <a href=""><i class="fas fa-laptop-code"></i> Ngobar</a> kita semua dapat belajar bersama tentang programing karena dengan situasi perubahan jaman yang semakin lama semakin jauh berkembang, mau tidak mau nyatanya teknologi lah yang selalu memudahkan kita dalam kehidupan di masa saat ini, seperti adanya sosial media itu pun membuat dunia seperti di genggaman kita, terasa dekat, maka dari itu tujuan di buatnya website ini mudah mudahan bisa mencerdaskan anak bangsa dan indonesia dapat bersaing di dunia yang serba teknologi ini.</p>
                        <span>Email: <a href="#">Ngobar@company.com</a><br></span>
                        <a href="#contact-us" class="main-button">Hubungi Kami</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="accordions is-first-expanded">
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Apakah Semua Kelas Free/ Gratis ?</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Untuk kelas sendiri tentunya ada yang gratis dan ada juga yang berbayar.</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Berapa lama untuk mengikuti kelasnya?</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Untuk proses lama atau tidaknya itu bermacam macam, tergantung kelas mana yang kamu pilih, dan bagaimana kamu mengerjakanya, karena lama atau tidaknya itu tergantung kamu sendiri, tetap semangat yaa ikuti prosesnya :).
                                  .</p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Apakah saya bisa menjadi mentor disini ?</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Tentu sangat bisa, Kamu bisa menjadi mentor <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a>, selain menjadi mentor kamu juga bisa mendapatkan penghasilan disini dari kelas pembelajaran premium yang nantinya kamu buat sendiri. 
                                    </p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Kalo ngga punya basic programing apakah bisa ikut ?</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Bisa ikut dong pastinya, karena disini <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a>  mengajarkan materi dari zero to hero, dari yang tadinya kamu gabisa jadi bisa, tentunya kamu harus mengikuti alur belajar nya ya.
                                    </p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Ada Sertifikat kelulusan nya ngga ?</span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p>Setiap kamu selesai mengikuti seluruh materi di kelas yang kamu pelajari dan upload hasil karya kamu untuk di jadikan CV kamu tentunya, kamu bakalan dapet sertifikat kelulusan.
                                    </p>
                                </div>
                            </div>
                        </article>
                        <article class="accordion">
                            <div class="accordion-head">
                                <span>Apakah nantinya dengan ikut kelas kita bisa mendapatkan pekerjaan IT sesuai kelas yang kita ikuti ? </span>
                                <span class="icon">
                                    <i class="icon fa fa-chevron-right"></i>
                                </span>
                            </div>
                            <div class="accordion-body">
                                <div class="content">
                                    <p><a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a> berkejasama dengan banyak perusahaan IT, perusahaan yang bekerjasama dengan <a href="#"><i class="fas fa-laptop-code"></i> Ngobar</a> memiliki akses ke fitur "Karya" , jadi maksimalkan belajarmu dan upload karyamu agar bisa di lihat oleh perusahaan partner kami. </p>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Frequently Question End ***** -->


    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="">
        <div class="container-fluid">
            <div class="row">
                <!-- ***** Contact Map Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="map">
                      <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7931.262390497903!2d106.5811062!3d-6.312085!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1625202327013!5m2!1sid!2sid" width="100%" height="555px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- ***** Contact Map End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12 " id="pertanyaan">
                    <div class="contact-form">
                        <h3 class="text-white text-center mb-3">Kirim Pertanyaan</h3>
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Nama Kamu" required="" class="contact-field bg-light">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" placeholder="E-mail" required="" class="contact-field bg-light">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Pesan Kamu" required="" class="contact-field bg-light"></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Kirim</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->


@endsection

