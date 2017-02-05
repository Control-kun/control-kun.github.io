<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
<section class="frt-footer">
	<div class="dg-w">
		<div class="dg-ww">
			<div class="dg-flexbox">
				<div class="dg-fi dg-fi--half">
					<ul class="dg-list dg-list--flexbox   dg-flexbox dg-flexbox--FW-nowrap dg-flexbox--AI-stretch dg-flexbox--JC-space-between">
						<li class="dg-li frt-footer__linkset">
							<h3 class="frt-title dg-title dg-title4">���� �������</h3>
							<ul class="dg-list">
								<li class="dg-li"><a href="/kitchens/" class="frt-link dg-link">�����</a>
								<li class="dg-li"><a href="/cabinets/" class="frt-link dg-link">�����</a>
								<li class="dg-li"><a href="/stones/" class="frt-link dg-link">�����</a>
								<li class="dg-li"><a href="/sturdy-furniture/" class="frt-link dg-link">������� ������</a>
							</ul>
						</li>
						<li class="dg-li frt-footer__linkset">
							<h3 class="frt-title dg-title dg-title4">��������</h3>
							<ul class="dg-list">
								<li class="dg-li"><a href="/contacts/" class="frt-link dg-link">��������</a>
								<li class="dg-li"><a href="/FAQ/" class="frt-link dg-link">F.�A.�Q.</a>
							</ul>
						</li>
						<li class="dg-li frt-footer__linkset">
							<h3 class="frt-title dg-title dg-title4">���������� ����</h3>
							<ul class="dg-list">
								<li class="dg-li"><a href="" class="frt-link dg-link">Instagram</a>
								<li class="dg-li"><a href="" class="frt-link dg-link">���������</a>
							</ul>
						</li>
					</ul>
				</div>
				<div class="dg-fi dg-fi--half">
					<div class="dg-flexbox dg-flexbox--FD-row-reverse">
						<div>
							<p class="frt-margin-v frt-text">�������� �������? ������� �� ��������<br>��� �������� ������</p>
							<p class="frt-margin-v"><a href="tel:+78129925135" class="dg-link frt-link frt-link--phone">8�812�992�51�35</a></p>
							<p class="frt-margin-v"><button class="dg-button frt-button">��������</button></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dg-ww">
			<p class="frt-hspace frt-text">�����������, 2016 �. ���������� ��������� �������. ��� ����� ��������.<br><a href="#" class="dg-link frt-link">�������� ������������������</a></p>
		</div>
	</div>
</section>
<?$APPLICATION->IncludeComponent('bitrix:menu', 'bottom-menu1', Array(
	'ROOT_MENU_TYPE'        => 'top',     // ��� ���� ��� ������� ������
	'MAX_LEVEL'             => '2',       // ������� ����������� ����
	'CHILD_MENU_TYPE'       => 'top-sub', // ��� ���� ��� ��������� �������
	'USE_EXT'               => 'Y',       // ���������� ����� � ������� ���� .���_����.menu_ext.php
	'DELAY'                 => 'N',       // ����������� ���������� ������� ����
	'ALLOW_MULTI_SELECT'    => 'Y',       // ��������� ��������� �������� ������� ������������
	'MENU_CACHE_TYPE'       => 'N',       // ��� �����������
	'MENU_CACHE_TIME'       => '3600',    // ����� ����������� (���.)
	'MENU_CACHE_USE_GROUPS' => 'Y',       // ��������� ����� �������
	'MENU_CACHE_GET_VARS'   => '',        // �������� ���������� �������
	'COMPONENT_TEMPLATE'    => ''
),
false
);
// TODO: ��������� ����������� ����� �� ���������.
?>
	<div id="dg-JSC">
		<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.11.2.min.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.zoom.min.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/dg/s/component/control/SupraWorkspace/SupraWorkspace.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/dg/s/component/service/AJAX/AJAX.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/js/common.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvfEjBZb6q_A-UdMU6uK-SP4AHcODR24M&callback=initMap" async defer></script>
	</div>
</body>
</html>
