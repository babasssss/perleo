<x-content-layout>
  @include('components.trouveTaPerle')
  <main id="main">
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        @include('components.filtre')
      </div>
    </section>
  </main>
  @include('components.evenement_a_venir')
  @include('components.articles')
  
</x-content-layout>