<main>
    <div class="top-section">
        <div class="container">
            <h1>Panneau d'administration</h1>
            <div class="cta-list">
                <a class="cta" href="#reservations">Réservations</a>
                <a class="cta" href="#users-comments">Avis</a>
                <a class="cta" href="#articles">Articles</a>
                <a class="cta" href="#pages-gestion">Gestion Pages</a>
            </div>
        </div>  
    </div>
    <div class="transition"></div>
    <div id="reservations" class="admin-section">
        <h2>Liste des réservations</h2>
        <h3>Prochaines réservations</h3>
        <a>Remplir les indisponibilités</a>
        <a>Voir toutes les réservations</a>
    </div>
    <div class="transition"></div>
    <div id="users-comments" class="admin-section">
        <h2>Retours utilisateurs</h2>
        <h3>Derniers retours</h3>
        <a>Voir tous les retours</a>
    </div>
    <div class="transition"></div>
    <div id="articles" class="admin-section">
        <h2>Articles</h2>
        <a>Modifier un article</a>
        <a>Ajouter un article</a>
    </div>
    <div id="pages-gestion" class="admin-section">
        <h2>Gestion des pages</h2>
        <div class="cta-list">
            <a class="waves-effect waves-light btn modal-trigger cta" href="#edit-page">Modifier une page</a>
            <a class="waves-effect waves-light btn modal-trigger cta" href="#add-page">Ajouter une page</a>
        </div>
        
        <div id="edit-page" class="modal">
            <div class="modal-content">
                <h4>Modifier une page</h4>
                <div>
                    <form method="post" action="<?php echo $url->head;?>/pagesList" id="edit-page-form">
                        <select name="template">
                            <option value="homepage" selected>Page d'accueil</option>
                            <option value="room">Room</option>
                            <option value="cat">News</option>
                            <option value="equipment">Équipement</option>
                        </select>
                        <select name="language">
                            <option value="fr" selected>Français</option>
                            <option value="en">Anglais</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="submit">
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
        <div id="add-page" class="modal">
            <div class="modal-content">
                <h4>Ajouter une page</h4>
                <form method="post" action="<?php echo $url->head."/edit/page";?>">
                    <div class="radio-btn-list row">
                        <label class="col s3">
                            <input name="template" type="radio" value="homepage" checked/>
                            <span>Page d'accueil</span>
                        </label>
                        <label class="col s3">
                            <input name="template" type="radio" value="room"/>
                            <span>Room</span>
                        </label>
                        <label class="col s3">
                            <input name="template" type="radio" value="news"/>
                            <span>News</span>
                        </label>
                        <label class="col s3">
                            <input name="template" type="radio" />
                            <span>Équipement</span>
                        </label>
                    </div>
                    <input class="cta" type="submit" value="Créer">
                </form>
            </div>
            <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
    </div>
</main>