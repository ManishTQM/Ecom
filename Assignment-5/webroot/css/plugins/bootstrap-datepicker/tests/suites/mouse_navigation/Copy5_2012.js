module('Mouse Navigation 2012', {
    setup: function(){
        /*
            Tests start with picker on March 31, 2012.  Fun facts:

            * February 1, 2012 was on a Wednesday
            * February 29, 2012 was on a Wednesday
            * March 1, 2012 was on a Thursday
            * March 31, 2012 was on a Saturday
        */
        this.input = $('<input type="text" value="31-03-2012">')
                        .appendTo('#qunit-fixture')
                        .datepicker({format: "dd-mm-yyyy"})
                        .focus(); // Activate for visibility checks
        this.dp = this.input.data('datepicker')
        this.picker = this.dp.picker;
    },
    teardown: function(){
        this.picker.remove();
    }
});

test('Selecting date resets viewDate and date', function(){
    var target;

    // Rendered correctly
    equal(this.dp.viewMode, 0);
    target = this.picker.find('.datepicker-days tbody td:nth(7)');
    equal(target.text(), '4'); // Should be Mar 4

    // Updated internally on click
    target.click();
    datesEqual(this.dp.viewDate, UTCDate(2012, 2, 4))
    datesEqual(this.dp.date, UTCDate(2012, 2, 4))

    // Re-rendered on click
    target = this.picker.find('.datepicker-days tbody td:first');
    equal(target.text(), '26'); // Should be Feb 29
});

test('Navigating next/prev by month', function(){
    var target;

    equal(this.dp.viewMode, 0);
    target = this.picker.find('.datepicker-days thead th.prev');
    ok(target.is(':visible'), 'Month:prev nav is visible');

    // Updated internally on click
    target.click();
    // Should handle month-length changes gracefully
    datesEqual(this.dp.viewDate, UTCDate(2012, 1, 29));
    datesEqual(this.dp.date, UTCDate(2012, 2, 31));

    // Re-rendered on click
    target = this.picker.find('.datepicker-days tbody td:first');
    equal(target.text(), '29'); // Should be Jan 29

    target = this.picker.find('.datepicker-days thead th.next');
    ok(target.is(':visible'), 'Month:next nav is visible');

    // Updated internally on click
    target.click().click();
    // Graceful moonth-end handling carries over
    datesEqual(this.dp.viewDate, UTCDate(2012, 3, 29));
    datesEqual(this.dp.date, UTCDate(2012, 2, 31));

    // Re-rendered on click
    target = this.picker.find('.datepicker-days tbody td:first');
    equal(target.text(), '25'); // Should be Mar 25
    // (includes "old" days at start of month, even if that's all the first week-row consists of)
});

test('Navigating to/from year view', function(){
    var target;

    equal(this.dp.viewMode, 0);
    target = this.picker.find('.datepicker-days thead th.datepicker-switch');
    ok(target.is(':visible'), 'View switcher is visible');

    target.click();
    ok(this.picker.find('.datepicker-months').is(':visible'), 'Month picker is visible');
    equal(this.dp.viewMode, 1);
    // Not modified when switching modes
    datesEqual(this.dp.viewDate, UTCDate(2012, 2, 31));
    datesEqual(this.dp.date, UTCDate(2012, 2, 31));

    // Change months to test internal state
    target = this.picker.find('.datepicker-months tbody span:contains(Apr)');
    target.click();
    equal(this.dp.viewMode, 0);
    // Only viewDate modified
    datesEqual(this.dp.viewDate, UTCDate(2012, 3, 1)); // Apr 30
    datesEqual(this.dp.date, UTCDate(2012, 2, 31));
});

test('Navigating to/from decade view', function(){
    var target;

    equal(this.dp.viewMode, 0);
    target = this.picker.find('.datepicker-days thead th.datepicker-switch');
    ok(target.is(':visible'), 'View switcher is visible');

    target.click();
    ok(this.picker.find('.datepicker-months').is(':visible'), 'Month picker is visible');
    equal(this.dp.viewMode, 1);
    // Not modified when switching modes
    datesEqual(this.dp.viewDate, UTCDate(2012, 2, 31));
    datesEqual(this.dp.date, UTCDate(2012, 2, 31));

    target = this.picker.find('.datepicker-months thead th.datepicker-switch');
    ok(target.is(':visible'), 'View switcher is visible');

    target.click();
    ok(this.picker.find('.datepicker-years').is(':visibleMAMhE  �����������ʬ����Ȫ�����������������������������Ǜ��ȫ��������������Ⱥ��Ⱥ���ʪ������������������
���
���
�������
��Ȫ��ȫ��Ⱥ�             y      ���    ����   ����     �����  �����������   ���Ɉ�  �����  ������
���̺   ��ʀ �  � �    �        �##o!8�(y$1A�$p�+	J!& %D������a�B8�������՝�0�-8��&Q�9��7NDn$�)2m�K��mLη�F��~�G����7�#��b_�1\����<}�־~�R�CΣpo�D։��Dp�}�P�sBּRK]V:�)S��E�W���4 ��Ҁ~����f4>�$� ������F[�~ދ��_���;�W��*��r\��Su� �R�4���`2�\;-�){"�5�z�@�|7��Lp����8�@�-���D!����1����x���m�9�S�H���	p����̗�\��q��o��]�,�t����H�4�}��*���K�QWP�:�S�u���ӭ�A��]���h%�X�Z�b �z�Ӫ���L]�>�i[p5Q�������r@�.��
��W���w� �k�s0�k.�\Р
;|���\q��l-�T��\s��P��p�8�,�����Uχ�p�i]N\���2\P��+n���?� 4� ��+�Ѷ8�6X��.��M�BMk����"]) ����ʕ ��C�%�����?���`+9cH/*N�N_��a ��\@:Kq�@�e;+��J��������P���@��v �	<���A(F�0$5� �fj��n� ��K&��  �'�:��>�����0�G���XA.�@��Lh�`�x�@�
~P ��`aԘbh�2x�������%�t��	�Lh�`�x�@�
~P ��`a�p�3 @7�`�	2M�r�o�q��Q�
BQ ��#P`R�.a`d`�.`�&�8��	�QY�J�@�Lp@��ԃ5@p8:�f��Ap�3���TdP�袨 /�@�`2	����a0�� ` 2��>:�up�`��p��3@���@�y�"̚� �#��th(7@��� �� 	t;�2.�Јp<���,� �L&�4A�	Nt<�	~Ψ��O��(F���lp�H 9;l-h�5����O,��E� 
��A>F ;�v ����Ƥz�%9�"R�?,He��"ţ�,Rr>a�)����a�E�HJ��E�|xXEJ��X�a�j��E)�2��������A��
h��dA��k@,&����t�|U`P�DGd��35@p8K�Ё&	2N�ʂ�0O��A(D0Z����	r:p��d�@�@'�z���P��@�G��Xi�w��BM
�r��:�"����
�E��`�6���8���ؼ2`� �V��3i)b�ٔ�܂}� �Q�ۂ`�3���	��ouqd��;�f��<�g���ق�܂x 7]u�H�L`c���<oZ�d'�U�X�{�Bt.H��7Ae�h���H�8`p������Ś���ݦ`1��H�.�8;K�(��'�� �F:��1QP���PY�A]��p� ��'^��#d�@X��w��ö�5� x�� A%���(��<	ʊ��~D�p;�g@�C��4r<2��`��d�A�o:j�G��fj���L��c=vE���z��
؉�� � L�h�(?� aê��%�TU�MB�`��Lh>0
�0ĠA.v@��0�4�t�����&����J?7�_�����|�~�8�|̥41ǀX&ʼ�fA88Ĩ�\�D�	�@�>����0�0�lbG9�����6�)��B�.�*1P7 oA����>H<�*�A7�p�7�^�}��(�5b5�M��+`hn� �:���(]�!�X.A@�L�l��	x=���O(����d��35@`7�\��0�`��&	8<���|``��đ�z�I�Tx�R8%,��u	�"���`�HR�&,����E���`�HR�*{��������hx��	=O���(B8��	p9`�`z����X�8���dv Ł(�9ÈPృ��T(�������/�$q � iGȠ�R��.�~�`7�]{��@p�8�rA����k��������p 2A���2���eP��F�>,6(C��x�������%�t��	;&�8��	<����'�� �(������@057`�9�`�	2M�p��	x=���P�Cc�d:���&	8<��>���@ab���G&�4A�	�s��|t@��6��<Ag�>4�ȸE�@n��$�&� x���|-h��p�-���2��@NЮXx�@�
B1 �Nt��@/���;�VИ���d�`;q(Z΃ �nVHݐa�i ����@�;�x���z�%RiOR}0,E
��H)�"����)�H���HM氋u�H��H�갋��HT��H��"���C���d3�`7;��Y�(
� <:�u`�@��n�, Ah�(�ԩ�"���,R�8�"R�9,"E��)�a�)��+��H� �d�����
k	��
A�33Ќ�340`7'�D��} �c����O����
%�0�`�O���(�	pN������=uX0�-��鐺��1��i��Ӽ � (�3����۽L�^�4(� j��x�A)�&�N�(�3�{��w���J x`8`q��H9�y��{�@�1YJ-�?Ӈ�� ��P��� w�b��#�Rm�k%�"�sXEj<�X��d�H�갋���Hj�fOj�Y��0+5t`�`���߁��$P�4Ul

h��
�!1��`��<|�,]���[�͢q��U�H��1����y����7�n0�����$&?xT5�,V��f����ѓ0t @: uA�������~,8�f�yDTp�-��qp�0��
�@ˢ��
~: �=O���#E�@a4Ga �b2�x�����%��s���A�.�f��b;>��(F����C�M�	BN��ԓl�X�R7b~r(�����"�
�'E����@�P�d3�@59�d`\�d��x4(�jo�!HJ��?8\9�|`~�:�m Cp�KZt~��g3�@ZA�Eta��H�L` p���˂W�B�j�2��!�y𶠊Xo=t��(���������[ۘ\����e�P��H�E��I$p2�̀���$��1�H��&%�ǩ��<�x��_���A���*�w�ˀHn�� 3��%)��$�r�xI�K�|�ލ�V4����C)� StTJA���VW/�I('Ԙ��a�SVR0-��L��g)�*������B��w�.G�?�TF����KV��qJb�I�1^ �`$�;�$)����`H�����a��J�Vؾ��	GՈ����a��b�),5M�`%�aS�c��	�`��%^�a�����Hh�@��� hb%^�}a1�a�1��⤒�v8�Դ��^{��`Q��b�m��m�5d��H�0�B��Yc�a%iï�ń`!��J	��ҤesCV`[;q����+c��bՔ����`���P�
B�Noa���I��`a��{��e�|�Ŧ=��d���_��e1ؚ���e�a}v�ali�J�b�lƦ��d΋5aO�)�e���T�c'�׳�0Rb���l�4C^�`�On�ٔ�^Z����6%�ZR-L�X�G�-.]��X��E������ U�Hl,]�BS��0��>0�^H����I��F6։�����O�q��7�E�vxI"�m}h��Р�h����F2y�w�]cmp�VX����Z�A���Zx����)
�P�-$x@�Ԃ�P�LڀZi���O~Z��HgO�Z��}
�>-i���(�����-��=���zZ�bЍ<Z<Byҽ�
���|C��c,%lC=�:�/�&j��ȣ���_�n;�/�^���2)���t'���                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  