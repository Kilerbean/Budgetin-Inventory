<footer>    
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="text-muted"><img class="img-fluid" src="{{ asset('icon/app-icon.png') }}" alt="{{ config('app.name') }}"
                    style="height: 25px"> Copyright {{date('Y')}}-{{date('Y', strtotime('+1 year'))}} © 
                    {{config('app.name')}} {{config('app.version')}} All rights reserved.</p>                 
            </div>
            <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="https://saweria.co/rakaarif" target="_blank">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="http://172.19.19.39/panduan/PanduanRISE-ANA.pdf" target="_blank">Help Center</a>
                        <a class="text-muted" href="/logout">| Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>