<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="mb-4 text-center">Get In Touch</h1>
                <p class="text-center mb-5">Have questions or ready to plan your adventure? Fill out the form below or contact us directly.</p>

                 {{-- Optional: Add contact info like phone/email here --}}
                 {{-- <div class="text-center mb-5">
                     <p><strong>Email:</strong> info@expediction.test</p>
                     <p><strong>Phone:</strong> +1 234 567 890</p>
                 </div> --}}

                <div class="card">
                    <div class="card-body">
                        <form action="#" method="POST"> {{-- Replace # with actual endpoint later --}}
                            @csrf {{-- CSRF Protection --}}

                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
