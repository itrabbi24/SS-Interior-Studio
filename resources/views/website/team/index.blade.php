@extends('website.shared.layout')

@section('title', 'Our Team - SS Interior')

@section('content')
<!-- Page Banner -->
	<div class="pbmit-title-bar-wrapper">
		<div class="container">
			<div class="pbmit-title-bar-content">
				<div class="pbmit-title-bar-content-inner">
					<div class="pbmit-tbar">
						<div class="pbmit-tbar-inner container">
							<h1 class="pbmit-tbar-title"> Our Team</h1>
						</div>
					</div>
					<div class="pbmit-breadcrumb">
						<div class="pbmit-breadcrumb-inner">
							<span>
								<a title="" href="#" class="home"><span>SS Interior</span></a>
							</span>
							<span class="sep">
								<i class="pbmit-base-icon-angle-right"></i>
							</span>
							<span><span class="post-root post post-post current-item"> Our Team</span></span>
						</div>
					</div>
				</div>
			</div> 
		</div> 
	</div>



<!-- Team Structure -->
<section class="section-md">
    <div class="container">
        <div class="pbmit-heading-subheading text-center mb-5">
            <h4 class="pbmit-subtitle">Organizational Structure</h4>
            <h2 class="pbmit-title">Our Professional Team</h2>
        </div>

        <div class="team-hierarchy">
            <!-- Founder & CEO -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Founder & CEO</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="team-member">
                        <div class="rounded-avatar">
                            <img src="{{ asset('public/images/team/founder.jpg') }}" alt="Saidur Rahman" onerror="this.onerror=null; this.src='https://via.placeholder.com/150x150/bb9a65/ffffff?text=SR'">
                        </div>
                        <h5 class="member-name">Saidur Rahman</h5>
                        <p>Founder & CEO</p>
                    </div>
                </div>
            </div>

            <!-- Senior Advisor -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Senior Advisor</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="team-member">
                        <div class="square-avatar">Tansen Alam</div>
                        <!-- <h5 class="member-name">Tansen Alam</h5> -->
                         <br>
                        <p>Architect, Titas Gas TDCL</p>
                        <p>Adj Faculty, AUST</p>
                        <p>M.Arch (BUET), B.Arch (BUET)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Md. Selim Ahmed</div>
                        <!-- <h5 class="member-name">Md. Selim Ahmed</h5> -->
                         <br>
                        <p>Architect B (Arch)</p>
                        <p>Member IAB: A-256</p>
                    </div>
                </div>
            </div>

            <!-- Principal Architect -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Principal Architect</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="team-member">
                        <div class="rounded-avatar">
                            <img src="{{ asset('public/images/team/principal-architect.jpg') }}" alt="Tasmia Jaman" onerror="this.onerror=null; this.src='https://via.placeholder.com/150x150/bb9a65/ffffff?text=TJ'">
                        </div>
                        <h5 class="member-name">Tasmia Jaman</h5>
                        <p>Principal Architect</p>
                        <p>B.Arch (KMU)</p>
                        <p>Member IAB: J-039</p>
                    </div>
                </div>
            </div>

            <!-- Associate Architects -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Associate Architects</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="team-member">
                        <div class="square-avatar">Abdullahil Hadi</div>
                        <!-- <h5 class="member-name">Abdullahil Hadi</h5> -->
                        <p>Associate Architect</p>
                        <p>B.Arch (KU)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Farjana Sarkar</div>
                        <!-- <h5 class="member-name">Farjana Sarkar</h5> -->
                        <p>Associate Architect</p>
                        <p>B.Arch (HSTU)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Mursheduzzaman</div>
                        <!-- <h5 class="member-name">Mursheduzzaman</h5> -->
                        <p>Associate Architect</p>
                        <p>B.Arch</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Kamruzzaman Antor</div>
                        <!-- <h5 class="member-name">Kamruzzaman Antor</h5> -->
                        <p>Associate Architect</p>
                        <p>B.Arch</p>
                    </div>
                </div>
            </div>

            <!-- Structural Engineers -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Structural Engineers</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="team-member">
                        <div class="square-avatar">Gazi Nazmul Haque</div>
                        <!-- <h5 class="member-name">Gazi Nazmul Haque</h5> -->
                        <p>Architect, Titas Gas TDCL</p>
                        <p>BSC in Civil</p>
                        <p>MSC in Civil</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Md. Selim Ahmed</div>
                        <!-- <h5 class="member-name">Md. Selim Ahmed</h5> -->
                        <p>Architect (B.Arch)</p>
                        <p>Member IAB: A-256</p>
                    </div>
                </div>
            </div>

            <!-- Civil Engineers -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Civil Engineers</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="team-member">
                        <div class="square-avatar">Md. Moniruzzaman</div>
                        <!-- <h5 class="member-name">Md. Moniruzzaman</h5> -->
                        <p>BSC in Civil</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Ferdous Kabir Himel</div>
                        <!-- <h5 class="member-name">Ferdous Kabir Himel</h5> -->
                        <p>BSC in Civil</p>
                    </div>
                </div>
            </div>

            <!-- Mechanical Engineers -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Mechanical Engineers</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="team-member">
                        <div class="square-avatar">Md. Faysal Hossain</div>
                        <!-- <h5 class="member-name">Md. Faysal Hossain</h5> -->
                        <p>BSC in EEE</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Md. Jahirul Islam</div>
                        <!-- <h5 class="member-name">Md. Jahirul Islam</h5> -->
                        <p>BSC in EEE</p>
                    </div>
                </div>
            </div>

            <!-- Management Team -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Management Team</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4">
                    <div class="team-member">
                        <div class="square-avatar">Mehedi Hasan</div>
                        <!-- <h5 class="member-name">Mehedi Hasan</h5> -->
                        <p>BA, MA (Dhaka University)</p>
                        <p>Head of Management</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center flex-wrap gap-4 mt-4">
                    <div class="team-member">
                        <div class="square-avatar">Sagor Ahmed</div>
                        <!-- <h5 class="member-name">Sagor Ahmed</h5> -->
                        <p>Manager</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Pranto</div>
                        <!-- <h5 class="member-name">Pranto</h5> -->
                        <p>Assistant Manager</p>
                    </div>
                </div>
            </div>

            <!-- Operation Team -->
            <div class="team-level text-center mb-5">
                <h3 class="level-title">Operation Team</h3>
                <div class="d-flex justify-content-center flex-wrap gap-4 mb-3">
                    <!-- <div class="team-member">
                        <div class="square-avatar">Pianto</div>
                        <h5 class="member-name">Pianto</h5>
                        <p>Assistant Manager</p>
                    </div> -->
                    <div class="team-member">
                        <div class="square-avatar">Sumon Miah</div>
                        <!-- <h5 class="member-name">Sumon Miah</h5> -->
                        <p>Supervisor (Project)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Moshur Ahmed</div>
                        <!-- <h5 class="member-name">Moshur Ahmed</h5> -->
                        <p>Supervisor (Carpenter)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Juwel Ahmed</div>
                        <!-- <h5 class="member-name">Juwel Ahmed</h5> -->
                        <p>Supervisor (Thai & Plumbing)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Khairul Islam</div>
                        <!-- <h5 class="member-name">Khairul Islam</h5> -->
                        <p>Supervisor (Paint)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Shahabuddin</div>
                        <!-- <h5 class="member-name">Shahabuddin</h5> -->
                        <p>Supervisor (Civil & Structural)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Sumon Ahmed</div>
                        <!-- <h5 class="member-name">Sumon Ahmed</h5> -->
                        <p>Supervisor (Paint & Hardware)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Jabed Ahmed</div>
                        <!-- <h5 class="member-name">Jabed Ahmed</h5> -->
                        <p>Supervisor (Electric)</p>
                    </div>
                    <div class="team-member">
                        <div class="square-avatar">Monir</div>
                        <!-- <h5 class="member-name">Monir</h5> -->
                        <p>Supervisor (Tiles & Granite)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.team-hierarchy { margin: 40px 0; }
.level-title { 
    color: #bb9a65; 
    font-weight: 600; 
    margin-bottom: 30px; 
    position: relative; 
    text-transform: uppercase;
}
.level-title:after { 
    content: ''; 
    position: absolute; 
    bottom: -5px; 
    left: 50%; 
    transform: translateX(-50%); 
    width: 80px; 
    height: 3px; 
    background: #bb9a65; 
}

.team-member { 
    text-align: center; 
    width: 180px; 
    margin-bottom: 20px; 
    transition: transform 0.3s ease;
}
.team-member:hover {
    transform: translateY(-5px);
}
.member-name { 
    margin-top: 15px; 
    font-size: 16px; 
    font-weight: 600; 
    color: #333;
    padding-bottom: 5px;
    position: relative;
}
.member-name:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 2px;
    background: #bb9a65;
}
.team-member p { 
    font-size: 14px; 
    color: #6c757d; 
    margin: 2px 0; 
}

.rounded-avatar {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #f8f9fa;
    border: 3px solid #bb9a65;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.square-avatar {
    width: 182px;
    height: 78px;
    border-radius: 35px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #f8f9fa;
    border: 3px solid #bb9a65;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    font-weight: bold;
    font-size: 15px;
    color: #bb9a65;
    text-align: center;
    padding: 3px;
}

.rounded-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.team-member:hover .rounded-avatar,
.team-member:hover .square-avatar {
    border-color: #8e704e;
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}
.team-member:hover .square-avatar {
    background: #bb9a65;
    color: white;
}

@media (max-width: 768px) {
    .rounded-avatar,
    .square-avatar { 
        width: 120px; 
        height: 120px; 
    }
    .square-avatar { 
        font-size: 18px; 
    }
    .team-member { 
        width: 140px; 
    }
}
</style>
@endsection