<x-app-layout>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
     
      
  </head>



  <body>
      <article id="the-article">
          <div>
              <div class="mx-auto max-w-6xl">
                  <div class="p-2 rounded">
                      <div class="flex flex-col md:flex-row">
                          <div class="md:w-1/3 p-4 text-sm">
                              <div class="sticky inset-x-0 top-0 left-0 py-12">
                                  <div class="text-3xl text-green-400 mb-8">List Pertanyaan.</div>
                                  <div class="mb-2">Masih bingung ?</div>
                                  <div class="text-xs text-gray-600">Hubungi kami untuk lebih detailnya</div>
                              </div>
                          </div>
                          <div class="md:w-2/3 py-12">
                              <div class="p-4">
                                      <div class="item px-6 py-6" x-data="{isOpen : false}">
                                          <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                                              <h4 :class="{'text-green-400 font-medium' : isOpen == true}">Mengapa saya harus login untuk menggunakan fitur-fitur tertentu ?</h4>
                                              <svg
                                                  :class="{'transform rotate-180' : isOpen == true}"
                                                  class="w-5 h-5 text-gray-500"
                                                  fill="none" stroke-linecap="round"
                                                  stroke-linejoin="round" stroke-width="2"
                                                  viewBox="0 0 24 24" stroke="currentColor">
                                                  <path d="M19 9l-7 7-7-7"></path>
                                              </svg>
                                          </a>
                                          <div x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-gray-600' : isOpen == true}">
                                              <p> Untuk memberikan pengalaman pengguna yang aman dan personal, login diperlukan agar kami dapat mengidentifikasi pengguna dengan tepat. Ini membantu kami melindungi informasi pribadi Anda dan memastikan bahwa Anda memiliki akses yang sesuai ke fitur-fitur kami.</p>
                                          </div>
                                      </div>
                                      <div class="item px-6 py-6" x-data="{isOpen : false}">
                                        <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                                            <h4 :class="{'text-green-400 font-medium' : isOpen == true}">Mengapa Harus Menggunakan Email saat membuat Akun ?</h4>
                                            <svg
                                                :class="{'transform rotate-180' : isOpen == true}"
                                                class="w-5 h-5 text-gray-500"
                                                fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </a>
                                        <div x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-gray-600' : isOpen == true}">
                                            <p>Email digunakan sebagai cara standar untuk mengonfirmasi identitas Anda saat mereset password. Dengan menggunakan email yang terdaftar, kami dapat memverifikasi bahwa permintaan reset password berasal dari Anda. Ini adalah langkah keamanan yang penting untuk melindungi akun Anda dari akses yang tidak sah..</p>
                                        </div>
                                    </div>
                                    <div class="item px-6 py-6" x-data="{isOpen : false}">
                                      <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                                          <h4 :class="{'text-green-400 font-medium' : isOpen == true}">Apa yang website ini lakukan?</h4>
                                          <svg
                                              :class="{'transform rotate-180' : isOpen == true}"
                                              class="w-5 h-5 text-gray-500"
                                              fill="none" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2"
                                              viewBox="0 0 24 24" stroke="currentColor">
                                              <path d="M19 9l-7 7-7-7"></path>
                                          </svg>
                                      </a>
                                      <div x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-gray-600' : isOpen == true}">
                                          <p> Warung purba adalah sebuah platform  platform digital yang menyediakan informasi lengkap dan akurat tentang warung makan di daerah Purbalingga. Aplikasi ini akan membantu pengguna dalam menemukan warung makan yang sesuai dengan selera dan kebutuhan pengguna.</p>
                                      </div>
                                  </div>
                                  <div class="item px-6 py-6" x-data="{isOpen : false}">
                                    <a href="#" class="flex items-center justify-between" @click.prevent="isOpen = true">
                                        <h4 :class="{'text-green-400 font-medium' : isOpen == true}">Apa yang bisa saya lakukan di website ini?</h4>
                                        <svg
                                            :class="{'transform rotate-180' : isOpen == true}"
                                            class="w-5 h-5 text-gray-500"
                                            fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </a>
                                    <div x-show="isOpen" @click.away="isOpen = false" class="mt-3" :class="{'text-gray-600' : isOpen == true}">
                                        <p> Pengunjung dapat memberikan rating dan menulis ulasan tentang warung, membantu warung meningkatkan layanan mereka dan memberikan informasi berharga bagi pengunjung lain. Fitur ini juga mendorong interaksi dan partisipasi dari komunitas pengguna.</p>
                                    </div>
                                </div>
                                 
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </article>

      <div
          x-data="scrollHandler(document.getElementById('the-article'))"
          x-cloak
          aria-hidden="true"
          @scroll.window="calculateHeight(window.scrollY)"
          class="fixed h-screen w-1 hover:bg-gray-200 top-0 left-0 bg-gray-300">
          <div :style="`max-height:${height}%`" class="h-full bg-green-400"></div>
      </div>

      <div
          id="alpine-devtools"
          x-data="devtools()"
          x-show="alpines.length"
          x-init="start()">
      </div>
      
      <script>
          function scrollHandler(element = null) {
              return {
                  height: 0,
                  element: element,
                  calculateHeight(position) {
                      const distanceFromTop = this.element.offsetTop;
                      const contentHeight = this.element.clientHeight;
                      const visibleContent = contentHeight - window.innerHeight;
                      const start = Math.max(0, position - distanceFromTop);
                      const percent = (start / visibleContent) * 100;
                      requestAnimationFrame(() => {
                          this.height = percent;
                      });
                  },
                  init() {
                      this.element = this.element || document.body;
                      this.calculateHeight(window.scrollY);
                  }
              };
          }
      </script>
  </body>
  <x-footer></x-footer>
</x-app-layout>
