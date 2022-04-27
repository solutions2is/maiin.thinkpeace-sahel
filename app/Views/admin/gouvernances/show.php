<style>
    .map{
        overflow: hidden;
    }

    .map__image path{
        fill: #a4ced2;
        stroke: #fff;
        stroke-width: 1px;
        transition: fill 0.3s;
    }

    .map__image .is-active path{
        fill: #19692c;
    }

    .map__list {
        float: right;
    }

    .map__list li a{
        font-size: 24px;
        font-family: "Arial";
        line-height: 45px;
    }

    .map__list a{
        color: inherit;
        text-decoration: none;
        transition: color 0.3s;
    }
    .map__list a.is-active{
        color: #19692c;
        font-weight: bold;
    }

    .indice{
        font-size: 32px;
        text-align: center;
        color: fff;
    }
    .indice-label{
        background-color: #5cb85c;
        padding: 10px 20px;
    }
</style>
<div class="row">
    <div class="col col-md-6 ">
            <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Carte de la région de Tombouctou</div>
            <div class="panel-body" style="margin-top: 10px; margin-left:10px;">
                <div class="col col-12 col-sm-12 map__image" >
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:amcharts="http://amcharts.com/ammap" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 650 500">

                            <a xlink:href="#" xlink:title="Tombouctou" id="region-Tombouctou" >
                                <path style="<?= $style_tombouctou; ?>;" d="M285.5,0.09L292.11,0.15L294.81,1.96L416.21,85.57L482.08,131.99L482.34,133.6L482.34,133.6L474.18,160.05L473.25,161.38L447.21,183.26L446.39,183.42L437.43,192.13L436.55,192.08L432.36,196.15L430.7,196.59L425.88,199.68L422.1,201.22L402.12,212.23L445.66,247.53L448.16,252.12L448.16,252.12L448.37,255.73L447.72,257.91L447.25,277.99L446.73,278.68L446.12,294.7L415.44,315.11L421.33,337.55L455.71,340.3L454.87,355.04L455.59,375.67L457.33,385.36L464.51,414.37L464.51,414.37L454.94,414.38L453.18,415.01L453.18,415.01L435.42,410.55L427.67,404.31L423.43,402.21L416.36,400.17L402.41,400.41L398.08,401.1L386.2,405.35L382.91,404.56L380.15,402.41L374.02,391.61L373.69,389.12L372.73,387.52L371.43,386.12L365.48,386.05L365.25,381.63L364.83,381.44L360.39,382.55L353.84,382.9L352.34,384.02L351.69,385.4L352.8,386.25L352.45,386.61L352.97,388.25L351.07,389.02L345.34,388.06L343.78,391.62L342.46,392.39L341.78,394.69L338.66,398.09L335.92,397.57L333.01,397.84L329.67,396.88L330.97,394.41L329.78,391.75L329.85,390.46L327.16,389.92L325.63,388.66L324.24,387.39L322.91,384.31L319.69,384.72L318.48,385.55L316.17,385.98L315.93,387.09L313.21,387.93L311.18,391.2L307.21,391.06L300.96,393.93L299.23,393.66L297,394.14L290.19,393.27L289.02,394L285.74,393.14L280.81,393.27L279.57,392.95L276.59,390.32L271.54,395.3L271.54,395.3L271.54,395.3L271.54,395.3L265.54,397.04L265.54,397.04L272.6,363.44L261.73,356.65L246.09,206.77L228.26,45.51L223.83,0z"/>
                            </a>
                    </svg>
                </div>  
            </div>
        </div>
    </div>
    <div class="col col-md-6">
            <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Synthèse du baromètre de gouvernance</div>
            <div class="panel-body indice">
               <div class="indice-label">72,40%</div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col col-md-3">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Leadership</div>
            <div class="panel-body indice">
               <div class="indice-label">80%</div>
            </div>
        </div>
    </div>
    <div class="col col-md-3">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Humain</div>
            <div class="panel-body indice">
               <div class="indice-label">70%</div>
            </div>
        </div>
    </div>
    <div class="col col-md-3">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Méthodes</div>
            <div class="panel-body indice">
               <div class="indice-label">90%</div>
            </div>
        </div>
    </div>
    <div class="col col-md-3">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Processus</div>
            <div class="panel-body indice">
               <div class="indice-label">79%</div>
            </div>
        </div>
    </div>
</div>