<script setup>
import { ref } from 'vue'
import { ChevronRight } from 'lucide-vue-next'
import { Head } from '@inertiajs/vue3'

const lastUpdated = '2025-02-26'

const sections = [
  {
    id: 'pendahuluan',
    title: 'Pendahuluan',
    content: `Terima kasih telah datang dan mempercayai HAVENTWINED sebagai pilihan untuk mengorganisir segala kegiatan Event yang akan pengguna selenggarakan dan/atau ikuti.

    Kebijakan Privasi akan menjelaskan bagaimana PT Bevinson Bermuda Acara sebagai pemilik brand HAVENTWINED mengumpulkan, menyimpan, memproses, dan/atau menampilkan informasi Data Pribadi Pengguna. HAVENTWINED menganggap privasi dan keamanan Data Pribadi Pengguna sebagai prioritas utama HAVENTWINED. Data Pribadi Pengguna seperti nama, nomor telepon, alamat email, dan data pribadi lainnya yang disimpan di Platform HAVENTWINED dibutuhkan untuk meningkatkan layanan HAVENTWINED kepada Pengguna. Pengguna yang dimaksud dalam hal ini dapat berperan sebagai Tenant, Event Organizer, maupun Pihak Ketiga manapun yang bekerja sama, berafiliasi dengan HAVENTWINED, dimana setiap Pengguna dapat memiliki satu peran atau lebih saat menggunakan Platform HAVENTWINED.

    Kebijakan Privasi ini berlaku untuk semua pengguna Platform HAVENTWINED dan HAVENTWINED dapat sewaktu-waktu, bila diperlukan untuk melakukan perubahan, mengganti, maupun melengkapi Kebijakan Privasi yang akan diperbarui melalui situs www.haventwined.com. Dengan menyetujui Kebijakan Privasi, Anda mengakui bahwa Anda telah membaca, memahami, dan menyetujui Kebijakan Privasi ini beserta segala ketentuannya. Dengan ini Anda juga setuju dan memberikan persetujuan kepada HAVENTWINED untuk mengumpulkan, menggunakan, membagikan, mengungkapkan, menyimpan, mentransfer, dan/atau mengolah Informasi Pribadi Anda sesuai dengan Kebijakan Privasi ini.`
  },
  {
    id: 'data-pribadi',
    title: 'Data Pribadi Pengguna yang Dikumpulkan',
    content: `Segala bentuk data yang dapat digunakan untuk menemukan, mengidentifikasi, dan/atau menghubungi suatu individu, kelompok, instansi, maupun perangkat lain terkait disebut sebagai “Data Pribadi Pengguna”. Data Pribadi Pengguna ini termasuk namun tidak terbatas pada data yang bersifat spesifik seperti namun tidak terbatas pada data biometrik, data kewarganegaraan (Kartu Tanda Penduduk, Surat Izin Mengemudi, Paspor, Nomor Pokok Wajib Pajak, dan data kewarganegaraan lainnya), maupun yang bersifat umum seperti namun tidak terbatas pada nama lengkap, tanggal lahir, tempat lahir, alamat domisili, jenis kelamin, nomor telepon, alamat email, akun media sosial, nomor rekening bank, profil pribadi, tanda pengenal unik, dan data lainnya yang termasuk sebagai Data Pribadi Pengguna sesuai yang dituliskan pada Peraturan Perundang-undangan yang Berlaku.`
  },
  {
    id: 'pengumpulan-data',
    title: 'Pengumpulan Data Pribadi Pengguna',
    content: `Apabila terdapat Data Pribadi Pengguna yang tidak lengkap saat diperlukannya pengumpulan untuk tujuan hukum, maupun kebijakan dan ketentuan lain dalam perjanjian yang dimiliki oleh HAVENTWINED dengan Pengguna, maka memungkinkan Pengguna tidak dapat menggunakan sebagian maupun keseluruhan layanan yang diberikan oleh HAVENTWINED serta tidak dapat melaksanakan perjanjian yang sedang dalam proses maupun yang telah HAVENTWINED miliki dengan Pengguna.
    
    Pengumpulan Data Pribadi Pengguna dilakukan dengan cara pemberian langsung oleh Pengguna maupun dari Pihak Ketiga lainnya dalam bentuk apapun sesuai yang diizinkan oleh Peraturan Perundang-undangan yang Berlaku.

    Pengumpulan Data Pribadi Pengguna dapat dilakukan HAVENTWINEND saat Pengguna melakukan tindakan apapun dalam penggunaan layanan yang tersedia pada Platform HAVENTWINED.

    Pengguna dapat memberikan Data Pribadi yang berkaitan dengan Pihak Ketiga manapun kepada HAVENTWINED setelah Pengguna mendapatkan persetujuan dari Pihak Ketiga tersebut.`
  },
  {
    id: 'penggunaan-data',
    title: 'Penggunaan Data Pribadi Pengguna',
    content: `Penggunaan Data Pribadi Pengguna secara Umum, untuk:
    
    a. Menyediakan segala jenis bantuan yang bertujuan untuk menyelesaikan masalah operasional, kesulitan teknis dengan Platform maupun layanan HAVENTWINED.
    
    b. Mendeteksi, menyelidiki, dan mencegah terjadinya kegiatan atau transaksi yang ilegal, dilarang, mencurigakan, tidak sah menurut HAVENTWINED maupun Peraturan Perundang-undangan yang Berlaku.
  
    c. Membantu HAVENTWINED untuk mematuhi kewajiban terhadap Peraturan Perundang-undangan yang Berlaku dalam penyelidikan, menanggapi permintaan, memenuhi persyaratan pengarsipan, pelaporan, perizinan, dan pemeriksaan audit.

    d. Memfasilitasi transaksi aset bisnis yang melibatkan HAVENTWINED dan/atau Pihak Ketiga yang terafiliasi dengan HAVENTWINED.

    e. Melakukan keseluruhan proses dan fungsi bisnis HAVENTWINED.

    f. Mendukung, memantau, mengefisiensikan penggunaan Platform HAVENTWINED sehingga dapat meningkatkan pengalaman, pertumbuhan, kinerja pengguna dan fungsi-fungsi pada Platform HAVENTWINED.

    g. Menghasilkan data analitik dan statistik yang bertujuan untuk penelitian, analisis, pengujian, pengembangan produk, dan kerja sama.

    Penggunaan Data Pribadi Pengguna sebagai Tenant, untuk:

    a. Mendaftarkan Pengguna sebagai Tenant dan memastikan, mengidentifikasi, memverifikasi, membuat, menonaktifkan, atau mengelola akun Pengguna sebagai Tenant pada Platform HAVENTWINED.

    b. Memverifikasi dan memfasilitasi hal-hal yang diperlukan sebelum Pengguna dapat bergabung menjadi Tenant pada Event yang dimiliki oleh Event Organizer atau sebelum didaftarkannya Pengguna ke platform HAVENTWINED, termasuk proses Know Your Customer (KYC) maupun credit scoring (penilaian kredit) jika dibutuhkan.

    c. Memungkinkan Pengguna dapat menggunakan layanan yang telah disediakan Platform HAVENTWINED maupun melakukan permintaan penyediaan layanan baru pada Platform HAVENTWINED.

    d. Menyediakan informasi atas aktivitas, transaksi, pembaruan, pemeliharaan, pengembangan, pengujian, peningkatan layanan kepada Pengguna melalui Platform HAVENTWINED maupun di luar Platform HAVENTWINED.

    e. Membantu HAVENTWINED untuk berkomunikasi dan mengirimkan data kepada Pengguna dalam rangka menanggapi, memproses, mengolah, menyelidiki, dan menyelesaikan apabila terdapat pertanyaan, permasalahan, kritik, dan saran yang diberikan oleh Pengguna.

    f. Memberikan penawaran atas layanan yang disediakan oleh HAVENTWINED, Event Organizer, maupun Pihak Ketiga yang terafiliasi dengan HAVENTWINED melalui iklan, survei, komunikasi pemasaran berdasarkan hasil pemantauan dan analisis terhadap perilaku, aktivitas, preferensi, dan kebiasaan Pengguna dalam menggunakan layanan yang disediakan pada Platform HAVENTWINED.

    g. Memfasilitasi dan mengelola transaksi pembayaran dan pemesanan yang dilakukan Pengguna, termasuk transaksi yang dilakukan melalui uang dan/atau dompet elektronik, kartu pembayaran, dan rekening yang tersedia pada Platform HAVENTWINED.

    Penggunaan Data Pribadi Pengguna sebagai Event Organizer, untuk:

    a. Mendaftarkan Pengguna sebagai Event Organizer dan memastikan, mengidentifikasi, memverifikasi, membuat, menonaktifkan, atau mengelola akun Pengguna sebagai Event Organizer pada Platform HAVENTWINED.

    b. Memverifikasi dan memfasilitasi hal-hal yang diperlukan sebelum Pengguna dapat menyediakan layanan kepada Tenant atau sebelum didaftarkannya Pengguna ke platform HAVENTWINED, termasuk proses Know Your Customer (KYC) maupun credit scoring (penilaian kredit) jika dibutuhkan.

    c. Memfasilitasi, mengelola, menyelesaikan pembayaran kepada Pengguna atas layanan yang telah Pengguna berikan ke Tenant.

    d. Memberikan laporan kepada Pengguna atas layanan yang telah Pengguna berikan ke Tenant.

    e. Berkomunikasi dan mengirimkan informasi terkait penyediaan layanan yang Pengguna berikan, termasuk pemberitahuan atas pemesanan yang dilakukan oleh Tenant kepada Pengguna dan memfasilitasi penerimaan Pengguna atas pemesanan Tenant tersebut.

    f. Memberitahukan pengumuman dan pembaruan pada Platform HAVENTWINED maupun perubahan cara Pengguna dalam menyediakan layanan kepada Tenant.

    g. Menanggapi, memproses, dan menyelesaikan pertanyaan, permasalahan, kritik, dan saran yang diberikan oleh Tenant kepada Pengguna.

    h. Menyediakan informasi atas aktivitas, transaksi, pembaruan, pemeliharaan, pengembangan, pengujian, peningkatan layanan kepada Pengguna melalui Platform HAVENTWINED maupun di luar Platform HAVENTWINED.

    i. Memberikan penawaran atas layanan yang disediakan oleh HAVENTWINED maupun Pihak Ketiga yang terafiliasi dengan HAVENTWINED melalui iklan, survei, komunikasi pemasaran berdasarkan hasil pemantauan dan analisis terhadap perilaku, aktivitas, preferensi, dan kebiasaan Pengguna dalam menggunakan layanan yang disediakan pada Platform HAVENTWINED.`
  },
  {
    id: 'pengungkapan-data',
    title: 'Pengungkapan Data Pribadi Pengguna',
    content: `HAVENTWINED memiliki hak untuk dapat mengungkapkan, membagikan, maupun memberikan akses ke Data Pribadi Pengguna dengan Pengguna lainnya maupun Pihak Ketiga yang terafiliasi dengan HAVENTWINED.

    Pengungkapan Data Pribadi Pengguna sebagai Tenant diperlukan oleh Event Organizer agar dapat memproses pesanan, menghubungi, maupun memberikan layanan kepada Tenant.

    Pengungkapan Data Pribadi Pengguna sebagai Event Organizer diperlukan oleh Tenant agar dapat menggunakan dan meyakini kredibilitas layanan yang diberikan oleh Event Organizer.

    Apabila dibutuhkan dalam proses hukum dalam bentuk apapun antara HAVENTWINED dengan Pengguna, maupun Pengguna dengan pihak lain, maka HAVENTWINED dapat melakukan Pengungkapan Data Pribadi Pengguna.

    Setiap proses verifikasi yang dilakukan oleh HAVENTWINED maupun yang diperlukan oleh Pihak Ketiga yang terafiliasi dengan HAVENTWINED, maka Pengungkapan Data Pribadi Pengguna dapat dilakukan terlebih pada proses Know Your Customer (KYC), credit scoring (penilaian kredit), maupun saat pendaftaran Pengguna.

    Selama diperbolehkan, diinstruksikan, disyaratkan, diminta oleh institusi pemerintah dengan tujuan yang disebutkan dalam kebijakan, peraturan, surat pemerintah, maupun Peraturan Perundang-undangan yang Berlaku, maka HAVENTWINED dapat melakukan Pengungkapan Data Pribadi Pengguna dalam keadaan darurat yang berkaitan dengan keselamatan Pengguna maupun kepentingan umum.

    Sehubungan dengan penjualan aset perusahaan, penggabungan, restrukturisasi, akuisisi, pembiayaan, konsolidasi sebagian maupun semua bisnis HAVENTWINED oleh atau ke perusahaan lain, untuk keperluan transaksi tersebut maka HAVENTWINED dapat melakukan Pengungkapan Data Pribadi Pengguna, walaupun tidak ada jaminan transaksi tersebut akan tetap dilanjutkan.

    Pihak Ketiga yang terlibat, bekerja sama secara komersial, melakukan tugas atas nama HAVENTWINED, menyediakan layanan kepada HAVENTWINED yang secara teknis diperlukan untuk memproses transaksi Pengguna, memperkenalkan atau menawarkan produk atau layanan kepada Pengguna, melakukan pemasaran, analisis, pengembangan produk, penelitian, dan layanan lainnya, maka Pihak Ketiga tersebut dapat memperoleh Data Pribadi Pengguna melalui Pengungkapan ini.`
  },
  {
    id: 'pengamanan-data',
    title: 'Pengamanan Data Pribadi Pengguna',
    content: `Keamanan dan kerahasiaan pada Data Pribadi Pengguna merupakan prioritas utama bagi HAVENTWINED.

    HAVENTWINED akan berupaya untuk memberikan perlindungan dan pengamanan Data Pribadi Pengguna sebaik mungkin agar tidak dapat diakses, digunakan, dimanipulasi, dihapus, diolah, maupun diungkapkan oleh pihak manapun yang tidak memiliki wewenang atas Data Pribadi Pengguna tersebut.

    HAVENTWINED tidak dapat memberikan jaminan penuh apabila terjadi pencegatan, pengaksesan, pengungkapan, pengubahan, maupun penghapusan oleh pihak manapun yang tidak memiliki wewenang atas Data Pribadi Pengguna tersebut mengingat pengiriman data melalui internet tidak sepenuhnya aman yang menjadi faktor di luar kemampuan HAVENTWINED.

    Pengguna bertanggung jawab sepenuhnya untuk dapat menjaga dan tidak membagikan kerahasiaan detail akun dan keamanan perangkat yang digunakan Pengguna dalam bentuk apapun dari pihak manapun yang tidak memiliki wewenang atas Data Pribadi Pengguna tersebut, hal ini termasuk One Time Password (OTP) dan kata sandi untuk mengakses akun Pengguna pada Platform HAVENTWINED.`
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
  <Head title="Policy" />
  <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="max-w-3xl mx-auto text-center mb-16">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
          Privacy Policy
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