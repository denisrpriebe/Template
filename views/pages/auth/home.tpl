<[extends file="../../layout/app.tpl"]>

<[block name="page-title"]>Application Name : : Home<[/block]>

<[block name="page-script"]>
    <script>
        $(document).ready(function() {


        });
    </script>
<[/block]>

<[block name="page-content"]>

    <[include file="../layout/partials/navbar.tpl"]>

    <div class="container clear-nav">

        <[include file="../layout/partials/alerts.tpl"]>

        <div class="row">

            <[if Auth::user()->hasRole('Administrator')]>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Administrator Group</div>
                        <div class="panel-body">This panel should only be visible to Administrators.</div>
                    </div>
                </div>
            <[/if]>

            <[if Auth::user()->hasRole('Default')]>
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Default Group</div>
                        <div class="panel-body">This panel should only be visible to Default users.</div>
                    </div>
                </div>
            <[/if]>

            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Everyone</div>
                    <div class="panel-body">This panel should be visible to everyone.</div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Administrator Group</div>
                    <div class="panel-body">
                        Aenean quis ultricies augue, id congue magna. Morbi pharetra a nisi nec commodo. Aenean sit amet odio tincidunt, tincidunt velit a, luctus nisl. Sed vehicula, lectus a tincidunt efficitur, ante lacus malesuada lorem, et luctus neque magna sagittis neque. Nulla ipsum ante, convallis quis lorem congue, commodo pulvinar enim. Nullam auctor ornare ligula ac vulputate. Praesent ac viverra lacus. Curabitur accumsan ipsum erat, ut aliquam diam interdum eget. Aenean tincidunt lectus euismod dictum ullamcorper. Maecenas scelerisque orci vitae gravida porttitor. Curabitur vel mi sit amet mauris dictum consectetur sit amet id mauris. Aenean at turpis in lectus semper egestas. Duis lobortis sollicitudin euismod. Donec vel maximus dui, eget convallis ante. Quisque convallis laoreet nisi, ut aliquam justo pretium porttitor. Morbi at magna ac dolor dapibus tincidunt ac quis eros.
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Default Group</div>
                    <div class="panel-body">
                        Aenean pretium velit non erat laoreet, sit amet commodo nunc vestibulum. Proin tincidunt ipsum turpis, in interdum magna varius a. Integer nec tempus felis. Curabitur cursus turpis et est lacinia ornare. Etiam efficitur, risus ac vulputate pharetra, ante massa pretium lectus, non pharetra nisi ex non enim. Cras sit amet imperdiet urna. Fusce eleifend luctus tempor. Integer dui quam, ullamcorper ut eros a, viverra porta urna. Pellentesque et congue justo, tempor consequat sapien. Aliquam quis ipsum tempor, sagittis ipsum sit amet, vestibulum nunc. Vestibulum risus lorem, tincidunt sit amet malesuada at, condimentum vitae mi. Praesent ac volutpat tellus. In id fringilla tortor.
                    </div>
                </div>
            </div>


        </div>

        <div class="row">


            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Administrator Group</div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porttitor nibh eu fringilla ultricies. Etiam vestibulum feugiat mauris, sed facilisis metus congue a. Nullam sagittis ex placerat, lobortis ligula sit amet, ultrices nibh. In quis purus volutpat, egestas eros vel, lacinia tellus. Nunc non nibh at sapien tempus vulputate. Morbi posuere lorem a odio ornare hendrerit. Nam vulputate, massa eget hendrerit ullamcorper, ante neque viverra nulla, eget rhoncus nisl dui vel sapien. Suspendisse vitae felis et dolor bibendum suscipit. Proin eget odio vel urna iaculis euismod. Sed cursus, quam at posuere congue, lectus risus condimentum magna, vitae viverra ex ligula non nulla. Praesent ut aliquet turpis. Cras auctor nunc id volutpat tincidunt. Fusce non sapien nunc.
                    </div>
                </div>
            </div>


        </div>

        <div class="row">


            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Administrator Group</div>
                    <div class="panel-body">This panel should only be visible to Administrators.</div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Default Group</div>
                    <div class="panel-body">This panel should only be visible to Default users.</div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Everyone</div>
                    <div class="panel-body">This panel should be visible to everyone.</div>
                </div>
            </div>


        </div>

        <div class="row">


            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Administrator Group</div>
                    <div class="panel-body">
                        Aenean quis ultricies augue, id congue magna. Morbi pharetra a nisi nec commodo. Aenean sit amet odio tincidunt, tincidunt velit a, luctus nisl. Sed vehicula, lectus a tincidunt efficitur, ante lacus malesuada lorem, et luctus neque magna sagittis neque. Nulla ipsum ante, convallis quis lorem congue, commodo pulvinar enim. Nullam auctor ornare ligula ac vulputate. Praesent ac viverra lacus. Curabitur accumsan ipsum erat, ut aliquam diam interdum eget. Aenean tincidunt lectus euismod dictum ullamcorper. Maecenas scelerisque orci vitae gravida porttitor. Curabitur vel mi sit amet mauris dictum consectetur sit amet id mauris. Aenean at turpis in lectus semper egestas. Duis lobortis sollicitudin euismod. Donec vel maximus dui, eget convallis ante. Quisque convallis laoreet nisi, ut aliquam justo pretium porttitor. Morbi at magna ac dolor dapibus tincidunt ac quis eros.
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">Default Group</div>
                    <div class="panel-body">
                        Aenean pretium velit non erat laoreet, sit amet commodo nunc vestibulum. Proin tincidunt ipsum turpis, in interdum magna varius a. Integer nec tempus felis. Curabitur cursus turpis et est lacinia ornare. Etiam efficitur, risus ac vulputate pharetra, ante massa pretium lectus, non pharetra nisi ex non enim. Cras sit amet imperdiet urna. Fusce eleifend luctus tempor. Integer dui quam, ullamcorper ut eros a, viverra porta urna. Pellentesque et congue justo, tempor consequat sapien. Aliquam quis ipsum tempor, sagittis ipsum sit amet, vestibulum nunc. Vestibulum risus lorem, tincidunt sit amet malesuada at, condimentum vitae mi. Praesent ac volutpat tellus. In id fringilla tortor.
                    </div>
                </div>
            </div>


        </div>

        <div class="row">


            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Administrator Group</div>
                    <div class="panel-body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porttitor nibh eu fringilla ultricies. Etiam vestibulum feugiat mauris, sed facilisis metus congue a. Nullam sagittis ex placerat, lobortis ligula sit amet, ultrices nibh. In quis purus volutpat, egestas eros vel, lacinia tellus. Nunc non nibh at sapien tempus vulputate. Morbi posuere lorem a odio ornare hendrerit. Nam vulputate, massa eget hendrerit ullamcorper, ante neque viverra nulla, eget rhoncus nisl dui vel sapien. Suspendisse vitae felis et dolor bibendum suscipit. Proin eget odio vel urna iaculis euismod. Sed cursus, quam at posuere congue, lectus risus condimentum magna, vitae viverra ex ligula non nulla. Praesent ut aliquet turpis. Cras auctor nunc id volutpat tincidunt. Fusce non sapien nunc.
                    </div>
                </div>
            </div>


        </div>

    </div>


<[/block]>

