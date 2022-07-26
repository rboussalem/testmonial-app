<section class="form">
    <div class="container">
        <div class="form-content">
            @if ($form_type == 'update')
                <div class="date">
                    <span>{{$testmonial->created_at->diffForHumans()}}</span>
                </div>
            @endif
            <form id="form" method="POST" action="{{route( $route , ($form_type == 'update') ? ['id' => $testmonial->id] : [] ) }}" enctype="multipart/form-data">
                @csrf
                @if ($form_type == 'update')
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" value="{{old('titre', $testmonial->titre?? null)}}">
                </div>
            
                <div class="form-group">
                    <label for="file">Image / File</label>
                    @if ($form_type == 'update' && $testmonial->path) <a class="download" href="" download="{{ asset($testmonial->path) }}">Ancien Fichier <i class="fas fa-download"></i></a> @endif
                    <input type="file" name="file" >
                </div>
            
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea type="text" name="message">{{old('message', $testmonial->message?? null)}}</textarea>
                </div>
                
                @if ($form_type == 'update')
                <div class="form-group">
                    <label for="statut">Statut</label>
                    <div class="select">
                        <select name="statut">
                            <option value="en attente" @if (old('statut', $testmonial->statut?? null) == 'en attente') selected @endif >En attente</option>
                            <option value="approuvé" @if (old('statut', $testmonial->statut?? null) == 'approuvé') selected @endif>Approuvé</option>
                            <option value="rejeter" @if (old('statut', $testmonial->statut?? null) == 'rejeter') selected @endif>Rejeter</option>
                        </select>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    
                </div>
                @endif
                
                <button type="submit">{{$slot}}</button>
            </form>
        </div>
    </div>
</section>

