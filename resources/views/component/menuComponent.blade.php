<div class="side_menu_section">
    <ul class="menu_nav">
        <li @if($page == 'H') class="active" @endif>
            <a href="feed">Home</a>
        </li>
        <li @if($page == 'C') class="active" @endif>
            <a href="feedUploadPhoto">Carica foto</a>
        </li>
        <li @if($page == 'M') class="active" @endif>
            <a href="myPhotos">Le mie foto</a>
        </li>
        <li @if($page == 'P') class="active" @endif>
            <a href="profile">Il mio Profilo</a>
        </li>
        <li @if($page == 'E') class="active" @endif>
            <a href="logout">Esci</a>
        </li>
    </ul>
</div>