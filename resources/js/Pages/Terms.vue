<script setup>
import { ref } from 'vue'
import { ChevronRight } from 'lucide-vue-next'
import { Head } from '@inertiajs/vue3'

const lastUpdated = '2025-02-26'

const sections = [
  {
    id: 'pendahuluan-umum',
    title: 'Pendahuluan Umum',
    content: `Terima kasih telah datang dan mempercayai HAVENTWINED sebagai pilihan untuk mengorganisir segala kegiatan Event yang akan pengguna selenggarakan dan/atau ikuti.
    
    Syarat dan ketentuan yang ditetapkan di bawah ini mengatur penggunaan segala jasa maupun platform yang dimiliki dan ditawarkan oleh PT Bevinson Bermuda Acara selaku pemilik brand HAVENTWINED. Pengguna diwajibkan untuk membaca, mengerti, memahami, dan menyetujui terlebih dahulu segala syarat dan ketentuan yang telah ditetapkan sebelum pengguna menggunakan jasa maupun platform HAVENTWINED. Dengan menggunakan jasa maupun platform HAVENTWINED, maka pengguna setuju dan tunduk serta terikat secara langsung dengan syarat dan ketentuan yang telah HAVENTWINED tetapkan. Jika pengguna tidak menyetujui salah satu, sebagian, atau seluruh syarat dan ketentuan, maka pengguna tidak diperkenankan menggunakan jasa dan platform yang ditawarkan oleh HAVENTWINED.`
  },
  {
    id: 'definisi-umum',
    title: 'Definisi dan Interpretasi Umum',
    content: `Ungkapan yang digunakan dalam syarat dan ketentuan memiliki arti sebagai berikut, kecuali jika merujuk konteks yang lain.

    “HAVENTWINED” merujuk kepada PT Bevinson Bermuda Acara sebagai pemilik brand HAVENTWINED. PT Bevinson Bermuda Acara adalah sebuah perseroan terbatas yang bergerak di bidang teknologi penyediaan piranti lunak berupa platform yang memfasilitasi kemudahan, kecepatan, dan keakuratan seluruh pengelolaan Event bagi Event Organizer dan Tenant mulai dari pembuatan, publikasi, pembayaran hingga pelaporan dalam satu platform, di mana platform tersebut dapat berubah dari waktu ke waktu berdasarkan keputusan dan kebijakan HAVENTWINED.
    
    “Situs” merujuk kepada www.haventwined.com yang dimiliki dan dikelola oleh HAVENTWINED.
    
    Platform merujuk kepada media sosial, teknologi, piranti lunak, aplikasi mobile, Situs, maupun versi mobile dari Situs yang dimiliki dan dikelola oleh HAVENTWINED dari waktu ke waktu.
    
    “User” , “Pengguna” , atau “Anda” merujuk kepada setiap individu, perkumpulan, organisasi, institusi, maupun badan hukum yang mengakses, membuat akun, menggunakan, dan/atau memanfaatkan Platform HAVENTWINED baik untuk keperluan pribadi maupun sebagai perwakilan dari suatu instansi tertentu termasuk namun tidak terbatas pada Event Organizer, Tenant, Mitra, dan Pengunjung.
    
    “Event” merujuk kepada seluruh kegiatan yang diselenggarakan oleh Event Organizer melalui penggunaan jasa layanan Platform HAVENTWINED untuk memfasilitasi kegiatan acara tersebut baik yang bersifat komersial maupun tidak komersial.
    
    “Event Organizer” merujuk kepada setiap individu, perkumpulan, organisasi, institusi, maupun badan hukum lainnya yang menjadi pemilik, penyelenggara, panitia, perwakilan, dan/atau promotor suatu Event yang bekerja sama dengan HAVENTWINED melalui penggunaan jasa layanan Platform HAVENTWINED termasuk namun tidak terbatas pada layanan yang HAVENTWINED sediakan di Situs maupun media lainnya.

    “Brand” atau “Merek Dagang” merujuk kepada identitas produk yang dihasilkan oleh suatu usaha atau bisnis untuk membedakan satu produk dengan produk lainnya.

    “Tenant” merujuk kepada setiap individu, perkumpulan, organisasi, institusi, maupun badan hukum lainnya yang menjadi pemilik maupun perwakilan dari suatu Brand yang menggunakan jasa layanan Platform HAVENTWINED sebagai sarana pengelolaan Brand beserta produk dari Brand tersebut, dan sewa menyewa tempat bazar pada Event yang diselenggarakan oleh Event Organizer.

    “Mitra” merujuk kepada setiap individu, perkumpulan, organisasi, institusi, maupun badan hukum lainnya yang melakukan kerja sama dengan HAVENTWINED antara lain termasuk namun tidak terbatas pada kerja sama penggunaan Platform HAVENTWINED untuk memfasilitasi keberlangsungan kegiatan Event yang diselenggarakan oleh Event Organizer maupun yang diikuti oleh Tenant.

    “Pengunjung” merujuk kepada setiap individu, perkumpulan, organisasi, institusi, maupun badan hukum lainnya yang mengunjungi, melihat-lihat, membeli produk, melakukan interaksi, maupun menikmati layanan yang ditawarkan oleh Tenant dan Event Organizer dalam suatu Event.

    “Booth” merujuk kepada setiap tempat, area, ruang beserta aksesoris yang ada di dalamnya yang digunakan untuk menjual, menyediakan layanan, memasarkan, maupun mempromosikan produk dari Brand yang dimiliki Tenant secara langsung kepada Pengunjung dan berinteraksi secara personal dalam suatu Event yang diselenggarakan oleh Event Organizer.

    “Bazar” merujuk pada bagian dari Event di mana terdapat Booth yang dapat disewa, ditempati oleh Tenant yang ingin bergabung ke Event tersebut sehingga terjadi interaksi antara Tenant, Pengunjung, dan Event Organizer di dalamnya.

    “Service Fee” atau “Biaya Jasa” merujuk pada biaya yang diberikan termasuk namun tidak terbatas oleh Tenant, Event Organizer, Mitra, dan Pengunjung kepada HAVENTWINED atas dasar penggunaan jasa Platform HAVENTWINED, di mana biaya tersebut dapat berupa uang, persentase, produk, maupun jasa yang dapat dinilai dan ditetapkan oleh HAVENTWINED berdasarkan ketentuan dan kebijakan HAVENTWINED.`
  },
  {
    id: 'ketentuan-umum',
    title: 'Ketentuan Umum',
    content: `Setiap Pengguna yang mengakses, membuat akun, menggunakan, dan/atau memanfaatkan Platform HAVENTWINED untuk keperluan pribadi dan/atau mewakili Pengguna lain dengan ini dianggap telah membaca, memahami, menerima, dan setuju untuk tunduk serta terikat pada semua syarat dan ketentuan penggunaan Platform HAVENTWINED yang akan diuraikan di bawah dan selanjutnya disebut “Ketentuan Penggunaan”.

    Ketentuan Penggunaan merupakan perjanjian sah yang mengikat secara hukum baik perdata dan/atau pidana antara Pengguna dan HAVENTWINED.

    Setiap Pengguna menjamin kepada HAVENTWINED bahwa Pengguna adalah individu atau perwakilan Pengguna lain yang sah dan berhak untuk bertindak serta mengikatkan diri dalam perjanjian ini.

    Inkonsistensi dan konflik yang terjadi antara dua atau lebih ketentuan dalam Ketentuan Penggunaan ini baik dengan ketentuan penggunaan HAVENTWINED lainnya dan/atau ketentuan penggunaan Mitra HAVENTWINED yang tercantum dalam dokumen yang sama atau berbeda, maka HAVENTWINED akan menentukan ketentuan yang berlaku untuk inkonsistensi dan konflik tersebut.

    Pengguna wajib untuk membaca dan menerima syarat dan ketentuan atas penggunaan Platform HAVENTWINED.

    Perjanjian berlaku selama Pengguna menggunakan paling sedikit 1 Platform yang dimiliki oleh HAVENTWINED, baik sebelum Event dimulai maupun setelah Event berakhir sampai dengan Pengguna telah memenuhi seluruh kewajiban yang tertera pada perjanjian ini.

    Apabila terdapat perubahan pada Ketentuan Penggunaan yang bersifat substansial atau amandemen akan dipublikasikan melalui Platform HAVENTWINED. Pengguna diwajibkan membaca dan memahami dengan baik setiap perubahan atau amandemen yang berlaku sehingga apabila Pengguna tetap mengakses, membuat akun, menggunakan, dan/atau memanfaatkan Platform HAVENTWINED dianggap telah mengetahui, memahami, dan menyetujui perubahan atau amandemen tersebut.

    Semua pemesan Booth yang dilakukan oleh Tenant pada Event yang diselenggarakan oleh Event Organizer melalui Platform HAVENTWINED, merupakan perikatan terpisah dengan perikatan yang timbul dari perjanjian berdasarkan Ketentuan Penggunaan ini, yaitu perikatan yang timbul antara Tenant dan Event Organizer, yang masing-masing pihak terikat dan tunduk pada perikatan tersebut. HAVENTWINED hanya bertindak sebagai penyedia Platform yang bekerja sama dengan Event Organizer, sedangkan keseluruhan Booth dan perlengkapan penunjang lainnya yang disewakan oleh Event Organizer kepada Tenant adalah milik Event Organizer. Segala bentuk informasi dan data mengenai Event dan Booth yang disediakan oleh Event Organizer kepada HAVENTWINED, dan HAVENTWINED informasikan kepada calon Tenant, merupakan penawaran yang diberikan oleh Event Organizer kepada calon Tenant di mana mengikat untuk Event Organizer dan Tenant dalam hal terjadi penyewaan Booth tersebut. Oleh karena itu, HAVENTWINED bukan termasuk dalam pihak dalam hal terjadi sengketa, penuntutan hak, gugatan hak, permintaan hak, penggantian rugi, kerugian yang timbul, cidera yang timbul, kematian yang timbul, dan/atau klaim hak atas hak apa pun yang timbul terkait secara langsung maupun tidak langsung dari penyelenggaraan Event yang diminta oleh Event Organizer kepada Tenant, Mitra, dan Pengunjung Event dan begitu sebaliknya dari Tenant, Mitra, dan Pengunjung kepada Event Organizer, termasuk oleh pihak ketiga mana pun yang merasa dirugikan oleh penyelenggaraan Event oleh Event Organizer.

    Event Organizer, Tenant, Mitra, dan Pengunjung memahami dan menyetujui bahwa HAVENTWINED tidak memberikan jaminan dalam bentuk apa pun atas keberhasilan , hasil penjualan produk Brand, dan penyelenggaraan Event baik dalam bentuk hasil penyewaan Booth maupun kelancaran pelaksanaan Event. Dengan ini Event Organizer, Tenant, Mitra, dan Pengunjung membebaskan dan melepaskan HAVENTWINED dan menanggung dari segala bentuk tuntutan, gugatan, permintaan, kerugian, klaim, dan/atau segala bentuk penggantian hak oleh pihak manapun termasuk Event Organizer sendiri yang timbul akibat dari termasuk namun tidak terbatas pada hasil penyewaan Booth, hasil penjualan produk Brand, dan penyelenggaraan Event.

    Dengan menggunakan Platform dan layanan lainnya yang disediakan baik dari HAVENTWINED, Mitra HAVENTWINED, maupun pihak ketiga lainnya, maka Pengguna menyatakan setuju tidak akan
    
    a. Mengakses, memonitor, maupun menyalin data atau informasi apapun dari Platform HAVENTWINED baik secara manual, menggunakan robot, spider, scraper, atau cara otomatis apapun dengan tujuan tertentu tanpa adanya izin tertulis secara tegas dari HAVENTWINED terlebih dahulu.

    b. Menggunakan Platform HAVENTWINED untuk tujuan selain yang tertuang di Ketentuan Penggunaan yang akan dijabarkan lebih lanjut di bawah.

    c. Melakukan pelanggaran terhadap larangan dalam setiap Ketentuan Penggunaan yang akan dijabarkan lebih lanjut di bawah.

    d. Menjual kembali, menggunakan, memonitor, menampilkan, mengunduh, maupun mereproduksi setiap data atau informasi pada Platform dan layanan lain yang disediakan HAVENTWINED untuk kegiatan atau tujuan komersial atau kompetitif apapun.

    e. Mengambil tindakan apapun yang memberikan, atau dapat memberikan, menurut pendapat HAVENTWINED, suatu beban besar yang tidak wajar atau tidak proporsional pada segala aktivitas, kepercayaan Pengguna lain, maupun infrastruktur HAVENTWINED.

    f. Menyebarkan data, informasi, maupun pesan yang mencerminkan kegiatan yang melanggar hukum berdasarkan Ketentuan Penggunaan dan peraturan perundang-undangan yang berlaku kepada atau di seluruh Platform HAVENTWINED yang dianggap mengandung hal yang merugikan, pornografi, amoral, rasisme, diskriminasi, ancaman, penghinaan, hal yang menyinggung, penganiayaan, hal yang tidak patut, bersifat kekerasan, melanggar kesopanan, kebencian, pelecehan, dan tindakan lainnya yang dinilai salah oleh HAVENTWINED dan berpotensi dan/atau menyebabkan kerugian pada individu, suatu pihak, hak atas kekayaan intelektual atau hak lain dari individu maupun suatu pihak, termasuk tetapi tidak terbatas pada hak cipta, merek, paten, rahasia dagang, hak kerahasiaan pribadi atau publikasi.

    g. Melakukan deep-link, frame, mirror, atau cara lain dengan mencantumkan sebagian atau keseluruhan bagian dari Platform HAVENTWINED ke Platform lainnya tanpa persetujuan tertulis secara tegas dari HAVENTWINED terlebih dahulu.

    h. Berpura-pura menjadi individu, organisasi, badan hukum, maupun perwakilannya atau menyatakan dengan tidak benar mengenai hubungan Pengguna dengan individu, organisasi, badan hukum, atau menggunakan identitas palsu dengan tujuan merugikan pihak lain.

    i. Menggunakan Platform HAVENTWINED dengan cara apapun yang dapat merusak, melumpuhkan, terlalu membebani, atau merugikan atau mengganggu penggunaan Platform HAVENTWINED atau peralatan komputer Pengguna lainnya, atau menyebabkan kerusakan, gangguan atau membatasi fungsi dari setiap perangkat lunak, perangkat keras atau peralatan telekomunikasi.

    j. Memanipulasi, termasuk dengan memalsukan judul, untuk menyamarkan asal dari pesan yang Pengguna kirimkan.

    k. Memperoleh atau mencoba untuk memperoleh setiap data atau informasi melalui cara apapun yang tidak dengan sengaja disediakan melalui Platform HAVENTWINED, termasuk mengambil atau dengan cara lain mengumpulkan informasi mengenai pihak lain seperti alamat e-mail.

    l. Mencoba untuk memperoleh akses tanpa wewenang ke Platform HAVENTWINED, setiap Platform yang terkait, akun lain, sistem komputer atau jaringan yang terhubung dengan Platform HAVENTWINED, melalui pembajakan, pengambilan kata sandi, atau dengan cara lain apapun.

    m. Terlibat dalam setiap praktik penipuan yang ditujukan untuk memanipulasi Search Engine Results Page ("SERP") organik atau menggunakan teknik Search Engine Optimization ("SEO") yang dianggap bertentangan dengan pedoman mesin pencari yang lazim. Praktek SEO yang dianggap tidak etis, atau "Black Hat" atau "spamdexing", termasuk tetapi tidak terbatas pada Google bombs, metadata dan title tags, hidden text dan links, content scraping, cloaking, link schemes, keyword stuffing, doorway dan cloaked pages, link farming atau schemes, blog comment spam, dan lain-lain.

    n. Melakukan hal-hal lain apapun yang dapat menyebabkan kerugian pada Platform HAVENTWINED, kelompok perusahaan HAVENTWINED dan para direksi serta karyawannya, reputasi HAVENTWINED atau yang dapat memberikan dampak negatif lainnya menurut pendapat HAVENTWINED.

    Pada Platform HAVENTWINED memungkinkan adanya tautan (link) ke situs lain yang dikelola oleh pihak ketiga yang dapat disebut “Situs Eksternal”. Situs Eksternal ini tidak dioperasikan, dikendalikan, atau didukung oleh HAVENTWINED dalam bentuk apapun Situs Eksternal beserta konten/isi di dalamnya. Situs Eksternal ini disediakan hanya sebagai referensi dan kenyaman untuk Pengguna. Pengguna wajib mempelajari syarat dan ketentuan dari Situs Eksternal tersebut secara seksama dan bertanggung jawab penuh atas penggunaannya tanpa menyangkut pautkannya dengan HAVENTWINED.`
  },
  {
    id: 'ketentuan-akun',
    title: 'Ketentuan Pembuatan Akun',
    content: `Setiap Pengguna wajib membuat akun pada Platform HAVENTWINED saat hendak menggunakan dan memanfaatkan Platform HAVENTWINED untuk keperluan Event Pengguna.

    Pembuatan akun wajib memenuhi syarat pengisian data dan informasi Pengguna baik sebagai pribadi maupun perwakilan Pengguna lainnya yang kebenaran, validitas, legalitas, dan keabsahannya dapat dijamin oleh Pengguna.

    Setiap perbuatan dan tindakan yang dilakukan menggunakan akun tersebut merupakan tanggung jawab penuh Pengguna sebagai pembuat dan pemilik akun tersebut, termasuk segala bentuk penyalahgunaan yang dilakukan oleh pihak lain dan/atau Pengguna sendiri. Oleh sebab itu, Pengguna diwajibkan untuk menjaga kerahasiaan data dan informasi yang berkaitan dengan akun tersebut. Dengan ini, Pengguna membebaskan dan melepaskan HAVENTWINED dari tanggung jawab dalam bentuk apa pun terkait dengan penggunaan akun tersebut.

    Segala data dan informasi yang diisi oleh Pengguna saat pembuatan akun adalah dalam penguasaan dan kepemilikan penuh dari Pengguna, di mana Pengguna bertanggung jawab penuh atas kebenaran setiap data dan informasi yang diisi oleh Pengguna. Setiap bentuk kelalaian, kesalahan, kealpaan, kesalahan, dan/atau typo dalam bentuk dan alasan apa pun yang menyebabkan data dan informasi tersebut menjadi tidak bermakna sebagaimana yang akan dimaksud oleh Pengguna menjadi tanggung jawab penuh Pengguna, baik yang menimbulkan kerugian maupun yang tidak, termasuk namun tidak terbatas pada kesalahan nomor rekening, jadwal Event, tempat Event, dan informasi penting lainnya akan menjadi tanggung jawab Pengguna.

    Pengguna dengan ini menyatakan dan menjamin kepada HAVENTWINED bahwa Pengguna adalah badan hukum yang berhak, perwakilan sah yang berwenang, pemilik hak, dan/atau telah mendapat seluruh persetujuan yang diperlukan dalam membuat akun serta mengisi segala data dan informasi dalam pembuatan akun Pengguna.

    Pengguna dengan ini menyatakan dan menjamin kepada HAVENTWINED bahwa segala data dan informasi yang diberikan dan diisi dalam pembuatan akun Pengguna merupakan data dan informasi yang legal, valid, sah, dan menjadi kewenangan Pengguna untuk diberikan kepada HAVENTWINED.

    Dengan ini Pengguna sepakat dan setuju bahwa HAVENTWINED berhak untuk melakukan tindakan yang diperlukan termasuk namun tidak terbatas untuk menghapus, tidak memproses, memblokir, menutup akun Pengguna, baik untuk sementara (pembekuan akun Pengguna) atau untuk selamanya dan/atau dengan cara-cara yang HAVENTWINED anggap perlu berdasarkan kebijakan HAVENTWINED tanpa memberikan pemberitahuan sebelumnya kepada Pengguna dalam hal diduga dan/atau terdapat kegiatan Pengguna yang terindikasi seperti namun tidak terbatas pada pelanggaran Ketentuan Penggunaan ini; ketentuan hukum yang berlaku; penipuan, penyalahgunaan, maupun pencurian (termasuk indikasi penipuan, penyalahgunaan, maupun pencurian); kecurigaan aktivitas tindak pidana, pemberian informasi yang tidak akurat salah atau menyesatkan; pemesanan yang mencurigakan; sulit dihubungi/dijangkau; terdaftar pada “daftar hitam” oleh pemerintah atau organisasi internasional.

    Dalam hal pembuatan akun yang bertujuan mewakili Pengguna lain, Pengguna sepakat dan setuju untuk memberikan izin kepada HAVENTWINED termasuk namun tidak terbatas untuk melakukan pemindahan data dan informasi akun, maupun penghapusan akun Pengguna yang mewakili Pengguna lain.

    Dengan pembukaan dan penggunaan akun Pengguna di Platform HAVENTWINED, Pengguna membebaskan HAVENTWINED atas segala tanggung jawab, kehilangan, dan/atau kerugian yang timbul akibat penggunaan akun Pengguna, serta jika HAVENTWINED melaksanakan segala tindakan yang HAVENTWINED anggap perlu dalam pelaksanaan ketentuan akun sebagaimana diatur dalam poin-poin di atas.`
  },
  {
    id: 'pusat-bantuan',
    title: 'Pusat Bantuan',
    content: `Apabila terdapat pertanyaan maupun kendala, Pengguna dapat menghubungi HAVENTWINED melalui
    a. E-mail: support@haventwined.com
    b. WhatsApp Customer Service: +62 822-9944-9708`
  },
]

const activeSection = ref(sections[0].id)

const setActiveSection = (sectionId) => {
  activeSection.value = sectionId
}
</script>

<template>
  <Head title="Terms" />
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="max-w-3xl mx-auto text-center mb-16">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
          Terms and Conditions
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
          Last updated: {{ lastUpdated }}
        </p>
      </div>

      <div class="lg:grid lg:grid-cols-12 lg:gap-8">
        <div class="hidden lg:block lg:col-span-3">
          <nav class="sticky top-8">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
              Table of Contents
            </h2>
            <ul class="space-y-3">
              <li v-for="section in sections" :key="section.id">
                <a
                  :href="`#${section.id}`"
                  @click="setActiveSection(section.id)"
                  :class="[
                    activeSection === section.id
                      ? 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20'
                      : 'text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400',
                    'block px-3 py-2 rounded-md text-sm font-medium transition-colors'
                  ]"
                >
                  {{ section.title }}
                </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="lg:col-span-9">
          <div class="prose prose-blue dark:prose-invert max-w-none">
            <div
              v-for="section in sections"
              :key="section.id"
              :id="section.id"
              class="mb-12"
            >
              <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                <ChevronRight class="h-6 w-6 text-blue-600 dark:text-blue-400 mr-2" />
                {{ section.title }}
              </h2>
              <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <p
                  class="text-gray-600 dark:text-gray-400 whitespace-pre-line leading-relaxed"
                >
                  {{ section.content }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="">
        <p class="text-center text-gray-600 dark:text-gray-400 text-sm">
          If you have any questions about these Terms and Conditions, please contact us.
        </p>
      </div>
    </div>
  </div>
</template>

<style scoped>
html {
  scroll-behavior: smooth;
  scroll-padding-top: 2rem;
}

@media (prefers-reduced-motion: reduce) {
  html {
    scroll-behavior: auto;
  }
}
</style>