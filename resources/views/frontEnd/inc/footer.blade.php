<footer id="footer">
    @if($home != null)
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ $home->footer_text }}</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-html-template/ -->
                Designed by <a target="_blank" href="{{ $home->footer_link }}">BootstrapMade</a>
            </div>
        </div>
    @else
        <h6>There is no contents here. Please check it later:) Thanks</h6>
    @endif
</footer>
