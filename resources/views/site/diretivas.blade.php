@extends('site.base')

@section('content')
    
<div class="col-md-12">
    <div class="row no-gutters border rounded overflow-hidden  position-relative">

        <div class="col-md-6 text-center pt-3">
            <a href=" {{ url("assets/edital/ErgaOmnes-ChamadaPublicacao-022021.pdf") }} " class="btn btn-outline-success btn-lg" target="_blank"><i class="far fa-file-pdf"> Nova Chamada Edital 01/2021</i></a>
        </div>
        <div class="col-md-6 text-center pt-3">
            <a href=" {{ url("assets/template/ErgaOmnes-Template 02_2021.docx") }} " class="btn btn-outline-info btn-lg" target="_blank"><i class="fas fa-file-word"> Template 01/2021</i></a>
        </div>

        <div class="col p-4 d-flex flex-column position-static">
        <h5 >Diretrizes para autores</h5>
        <p class="text-justify">
            A Revista Eletrônica Norte Mineira de Direito Erga Omnes receberá em sua plataforma eletrônica <a href="www.revistaergaomnes.com.br">www.revistaergaomnes.com.br</a> 
            contribuições para publicação em fluxo contínuo.
        </p>
        <br>
        <p class="text-justify">
            As contribuições serão submetidas ao sistema de avaliação do <i>double blind peer review</i>, o que possibilita a análise de artigos sem a identificação do autor, 
            garantindo a idoneidade no processo de seleção tanto para os autores quanto para os avaliadores.
        </p>
        <br>
        <p class="text-justify">
            Todos os artigos recebidos serão submetidos a uma análise prévia da Equipe Editorial de sua adequação à linha editorial da Revista.
        </p>
        <br>   
        <p class="text-justify">
        Após concluída a análise prévia, todos os artigos que estejam condizentes com a linha editorial da Revista, que atendam aos critérios formais estabelecidos, e, 
        que não sejam de autores convidados, serão enviados, sem qualquer tipo de identificação, a dois professores do Conselho Avaliador a fim de que emitam 
        parecer fundamentado pela aceitação ou rejeição do artigo, conforme formulário próprio da Revista.
        </p>
        <br>
        <p class="text-justify">
        A análise das contribuições seguirá os seguintes critérios:
        <ol type="a">
            <li>adequação do título, resumo, introdução, considerações finais e referências</li>
            <li>a originalidade do tema e abordagens contidos no texto;</li>
            <li>a correção da linguagem e redação empregados no trabalho;</li>
            <li>a adequação da metodologia que orienta o trabalho científico;</li>
            <li>a estrita pertinência do artigo em relação às diretrizes para colaboradores da Revista Eletrônica Norte Mineira de Direito <i>Erga Omnes</i>.</li>
        </ol>
        </p>
        <br>
        <p class="text-justify">
        Na hipótese de um avaliador emitir parecer pela aceitação e outro pela rejeição de um mesmo artigo, este será remetido ao Editor Associado, 
        a fim de que emita parecer conclusivo pela aceitação ou rejeição do artigo.
        </p>
        <br>
        <p class="text-justify">
        Caso o artigo seja aceito com ressalvas, este será enviado ao autor para que faça as alterações sugeridas pelo(s) parecerista(s) e, 
        uma vez feitas as alterações, é enviado novamente ao(s) parecerista(s) 
        a fim de que avalie(m) as alterações e finalmente emita(m) parecer pela aceitação ou rejeição do artigo.
        </p>
        <br>
        <p class="text-justify">
        Os artigos rejeitados serão devolvidos aos autores, acompanhados dos pareceres, sem a identificação dos pareceristas.
        </p>
        <br>
        <p class="text-justify">
        Ao longo de todo o processamento da avaliação dos artigos não haverá qualquer tipo de identificação dos autores, 
        ao passo que estes também não conhecerão a identidade dos seus avaliadores.
        </p>
        <br>
        <p class="text-justify">
        Os artigos de autores convidados não serão submetidos ao procedimento de avaliação.
        </p>
        <br>
        <p class="text-justify">
        Os artigos apresentados em eventos científicos, desde que não tenham sido publicados, serão recebidos, mas passarão por todo o 
        processamento de avaliação a que se submetem as demais contribuições.
        </p>
        <br>
        <p class="text-justify">
        Após a finalização do double blind peer review, os artigos serão repassados aos Editores Associados que, em reunião com as Editoras, 
        decidirão quais os artigos, dentre aqueles com dois pareceres de recomendação positiva, serão publicados.
        </p>
        <br>
        <p class="text-justify">
        Os trabalhos científicos deverão ser submetidos no sítio eletrônico da revista em arquivo Word, atendendo aos seguintes requisitos:
        <ul>
            <li>ser inédito ou ter sido apresentado em eventos científicos, desde que não publicados;</li>
            <li>contar com até 06 autores e possuir de 15 a 30 páginas;</li>
            <li>páginas em folha A4, posição vertical, fonte Arial tamanho 12, alinhamento justificado, sem separação de sílabas;</li>
            <li>entrelinhas com espaçamento 1,5, entradas de parágrafos de 1,25 cm, margens de 3 cm (superior e esquerda) e de 2 cm (inferior e direita);</li>
            <li>observar as normas da ABNT (Associação Brasileira de Normas Técnicas), conforme as especificidades constantes do modelo para submissão.</li>
        </ul>
        </p>
        <br>
        <p class="text-justify">
        Os autores que publicarem nesta revista concordam com os seguintes termos:
        <ol type="a">
            <li>Os Autores mantém os direitos autorais e concedem à revista o direito de primeira publicação, 
                permitindo o compartilhamento do trabalho com reconhecimento da autoria do trabalho e publicação inicial nesta revista.</li>
            <li>Os Autores têm autorização para assumir contratos adicionais separadamente, para distribuição não-exclusiva da versão do trabalho publicada nesta revista 
                (ex.: publicar em repositório institucional ou como capítulo de livro), com reconhecimento de autoria e publicação inicial nesta revista.</li>
            <li>Os Autores têm permissão e são estimulados a publicar e distribuir seu trabalho online (ex.: em repositórios institucionais ou na sua página pessoal)
                 a qualquer ponto posterior ao processo editorial.</li>
            <li>Os Autores consentem que seus trabalhos sejam incorporados pela Revista Eletrônica Norte Mineira de Direito Erga Omnes em bases e sistemas de informação científica 
                existentes (indexadores e bancos de dados atuais) ou a existir no futuro (indexadores e bancos de dados futuros).</li>
            <li>Os autores asseguram a originalidade de seus trabalhos, podendo ser responsabilizados por plágio nos termos da legislação vigente.</li>
        </ol>
        </p>
        <br>
        <p class="text-justify">
        Serão aceitas publicações nos idiomas português, espanhol e inglês.
        </p>
        <br>   
        </div>
    </div>
</div>

@endsection