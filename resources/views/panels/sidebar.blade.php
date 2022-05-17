@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header mb-1">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="brand-logo bg-white p-0.5 rounded-circle">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="45px" height="45px"
                            viewBox="0 0 270 271" enable-background="new 0 0 270 271" xml:space="preserve">
                            <image id="image0" width="270" height="271" x="0" y="0" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAAEPCAYAAACz7SoAAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                            AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QA/wD/AP+gvaeTAAAt
                            3UlEQVR42u3dd2BV9d3H8ff33NyE4RZHHSRRnLgh94LjKdRVUYQEklqrVmutfVpHtVaRDA5Ta61W
                            1PporX20roZdKtaBe5AEXBUVRQl1ojJEgiS593yfP4J9gNwkd//u+L3+aXPOued+zjF8c8ZvgGVZ
                            lmVZlmVZlmVZVvYT0wGsNHKfLoC+/XDYFYddCeuuCLsi4gfdoWMjpxcevQEQ/CjtHcu9TTh8A4A6
                            LaiuBVmDyBq88FrwrYFBa3DFM32YVurZwpFLpr2yG164FE9LQEtQKUEoASkB3QvYMcUJ2oFPUf03
                            Dh/i8VHH/zrLcbx3CAdW2sKSG2zhyEbu071weg8E53CQw0GPAI4EdjMdrQffICwDloF3D7VDHjcd
                            yIpPgekAVhTcpv1w9FiQ40CPAw7hP//t1HS6WPRGOQrYF8/5Vae1C+7fgW8KT6B32/OMOGe96bBW
                            1+wVRyZyFx+MzzsV5QTgWOA7piMll/6IuuCDnRbPmTEduBQIg74O8hzKM+B7gYqK1aZTW//PFo5M
                            4C7ug0+PxeMkREcBB5uOlELzqQuc2WnpnPpBIA2AL8JnPOBVlCdB/0F55YuIZNWlVq6xhcMU98Xd
                            8fnHoFQAJwBFpiOlwRo8BuIGPttqaX29D780AIOi3M+nwKN4OpswT1BV1Wb6wPKNLRzpdN3zO9Ne
                            OBKkEjgV8JuOlFbKOUwIPNBp+Zz6y0H+EOde14HMR5hBm/eYLSLpYQtHqk1/r4i1ayoQ+TFwIvn7
                            QPrv1AVGdVo6v35vQvIWsEMSvmM1SD0O9zBq7GLTB5zLbOFIlclNB+FxAaI/IfNfk6baOpzQYdQc
                            +3GnNbNnzEAYm4LvfAvhPtr0HqqqvjB9AnKNLRzJ1HF1cRYiFwHHmY6TOfTH1AXv67R4zozTgAUp
                            /vJWkFng3UJ5VaPpM5ErbOFIhusX70i7dz7Kb4C9TcfJLPIIdWVndFpcX98bv7wJ7JfGMEsQprNq
                            zUNcfHG76TOTzWzhSMTkxfuj3mXAT4E+puNkoK/wvMNwh3zUac2cGdOAa42kUj7G4VYKW++wDc3i
                            YwtHPCY1HQ3UgZ4JOKbjZCzV85kQvLfT8r/PHEhYXwEKDSdcj3IHIb2Bqqo1hrNkFVs4YuEuOhSf
                            jEPlR9iC0QNdQF3w9M6LVZg781k62q5kivUot+Fvv5mRZ39pOkw2sIUjGpMbSlEZB1xI5JaN1ta+
                            wuFwagIfdloze+ZPEP2z6YBdaEG5jV6t0+wtTPds4eiO27gnPpmC6vnYghE95SdMCPyl0/LZs3dF
                            wm+T+a+nv0S4kTa92TYoi8wWjkjuXOznc+8XKJNITsOkfPIEtWWnRuxLMmfmX0DPNx0wevIuqldT
                            UTnPdJJMYwvHtiY2jkS4GdjfdJQs1PUtytwZJ6A8S3b+zi1E9DJGV71lOkimyMb/iKkxuekgVP8I
                            fM90lKyl+lMmBDs/v6ivL8QvrwKHmo6YgHaEO5DCGkaN+tp0GNPsmwH36QImN1yD6mvYopGIJ6kL
                            3BNxTaFcRXYXDQA/ymV47UuZO3Ok6TCm5fcVh9t4FI7cDRptd24rsvV4zuG4g//dac2sWcU43lKg
                            r+mQSSXMoE1/ma/9YPLzisNd3IdJTb/HYbEtGkmgXBWxaAD4vNvJtaLRccyV+GUZc+p/ZjqKCfl3
                            xTFp0SBwHgAOMh0lRyyktuzkLt6iVIH+zXTAlFPm4G//WT41HsufKw5VYXLj5eC8hC0aybIez/lJ
                            xKJRX78j6M2mA6aFUE7I/yZzZ44wHSV9h5wPpjTui8d9wDDTUXKLXExd2V0RV82ZeTfohaYTppki
                            3Eph36sZMaLVdJhUyv3CMbFpDMKfQHc2HSXHPElt2SmRb1FmDAOeIh9+vyJ7lbD8gLFj3zMdJFVy
                            91alvt7HxKbrEZ1hi0bSteDJxRGLxoIFRSB/JH+LBsDR+HQJc+tTMbJZRsjNwuEu7sc7Jf9E9Bry
                            +xc4RfQq3LIPIq7a1FIHeojphBlge1TqmTvjFu68M+cGpc69f1Tu4mNwvFlAiekoOeopastOini1
                            Mbf+cFSWkG+jt/dsIe36w1xq85FbVxwTGy/A8V7CFo0U0Q144QsjFg3XdVD5H2zRiORE/NLA32cO
                            NB0kWXKjcKgKExtchHvIj4mNzBC5Gndoc8R1Rxx2CR3TVVqRlRLWl5lVf3riuzIv+29V3KWFOC1/
                            Bs4xHSW3ydPUDj4x4tXG/Pr+hORNYHvTKbNAGLiC8spbTQdJRHZfcVz3/M44LY9ji0aqtSByUZfz
                            tYblj9iiES0fMJ3ZM25CNWv/cGdtcNyXS3B8/8S2Ak0DuZS6stsirppb/wNUHjadMCsJD7BqzQXZ
                            OFVDdhaOjrEzngD2NR0lDzxDbdn3umhWvgt+eQvYw3TIrCU8gq9XFSNHbjQdJRbZd6viLjoU1aew
                            RSMdNuL5ur5F8cst2KKRGOV0QpueYvbsXU1HiUV2FY5JiwbhOM8Ce5mOkhdEx+EOWh5xXUeHLvts
                            KTmCSPiJbCoe2VM4piw+HpyngH6mo+QF5SXCgdsjrltw/w4o/2M6Yo45GgktZP6DWfH7nR2FY8qi
                            IXjeAuyI4+myEcc7H1e8iGtbe/0O1N4qJp0cSajgyWwoHplfOCY1HInnW4B93Zc+wnhqh0Tu2Tlv
                            1nDQi0xHzF1yJCF/xt+2ZHbhmNx0EMhjtndrGikvcVBz5Fev8+f3wfPuIlvfxmWPo5DQo8ybl7F/
                            LDO3cLhLBmx+e2Kf2qdPxy1KVVU44tpQ6zRggOmQ+UHK8NrmdgxTkHkys3C4i/bBCT2JfXuSXiI1
                            Xd6izJo1BPQS0xHzzPdo3fAwTz9dYDrItjKvcPz2he3xOfNBik1HyTMvc9CK6RHXLFhQhKP3YOfP
                            NUBGs/bL2xLfT3JlVuGor/fRWvgAylGmo+SZTUj4wi5vUVpbJtjBeQwSLmbujPGmY2wpswrHOyXT
                            gbyfJSv9tJraoW9HXqWCSAHQYjplXlOmMHtGpekY38qcwjGpcRzwC9Mx8o6yiINX3tLlehFl9Nir
                            8ZwDEB4xHTePCQ73dTxrMi8zXqtNbqxAmZkxefLHJkSOorZsWVRbqwpzZ04AJpgOnreEzwg7Qxgz
                            ZqXJGOavOCY3HYRyD7ZomFAbddGAjquP8koX9GLAi/pzVvIoe+J4c6mv720yhtnC4S7dDtXZwI5G
                            c+QlbeDg5vhmWiuvuguVi7DFw5SjKJQ/mQxgrnCoCr6N9wCHmjwBeaoVpOu3KNGoGHsPquNMH0je
                            Un7E7Jk/N/X15grH5KZrUM2Yp8T5ReuoCyxNeDcVVb8DuSvh/VjxEZ3OrFnHmfhqM4VjUuN3gSlG
                            vjvvaQMHr/x90nbX7l0KPGv6qPKUH8d7kPr6XdL9xekvHO6rO4Hei22FaELityjbqqpqo10rgJyd
                            JzXD9adA7k73l6a/cPja/mibkxsiOiEptyjbqqpag4ZHYRuJmSGUM6f+wnR+ZXoLx6SG81D5YVq/
                            0+ogvMLuvptStv+Ks95G5QrTh5m/5Bbm1adtxP/0FY7JDaUgWT0JTRZrJSw/5uLBqR2Gv2Lsn0Bn
                            mT7YPNUXT+5P1wTX6Skcrjqo/BU79J8ZwkTcsjfT82X+nwJGWzXmscHstvO16fii9BQOX+MvASOv
                            jfKespjdnRvT9n3l5esQzqVjqkMr3USqmT37sFR/TeoLh7u4PypTU/49ViQtqP4o5bco2xpd+Twi
                            15s++DxViITvpr4+pW8tU184HO9W7EDDhsiVuMF3jXx1mzcJJflvcKxoBPHLr1L5BantWDap4WyQ
                            B1L6HVZXHqO27LQuZ2FLh9n1QxF5AdN9ovLTRjzncMaM+SAVO0/df9BpDbuCxNeJykrUF/i8Hxst
                            GgAVVS+D/NH0ychTfRAvZf/+Ulc42mUysHvK9m91TbmU6iGrTMcAoM/GccAK0zHyknAms+pPT82u
                            U8FddCiO8zqQcaMz5z55hLqyM0yn2MqcGacBC0zHyE/yPuu+PowLLtiUzL2m5orD8d2MLRomrMcL
                            G+tq3aXyykeBh0zHyE+6Pzv2/XWy95r8wjG5YTToKek4JdY2RK7GHfKR6RgRteuVwHrTMfKSyHjm
                            PZTUOYqSWzjcpYWo3JDWk2J1UJ6jZnDmjo1RVfUZMMl0jDzVB8+f1HFik1s4fBt/CRyQzjNiAdCK
                            6kXG36L0ZKd+t4Cmqem7tTW9kLn1SRttL3mF43ev97VDyRmi3GCsoVcshg8PQWobJlld8uFJ0gbP
                            Sl7h2NR6Gfb1qwG6kj5FvzWdImrllQtB55qOkZeE8mQNNZicwuEu2gHlKqMnJV8Jl/CbI7NrAB0f
                            VwLfmI6RlxxvYlJ2k5QwPt8VQNrHPbR0HrXBf5hOEbMzq1YA6euxa23pRGbXH5/oThIvHO5Lu6Bq
                            R35Kv404/stNh4hbQa/rgU9Mx8hLIglPYJ144fAV/BI7oZIBMpWaY7J3wJyRIzcidipJQ05j1qyy
                            RHaQWOGY/l4RaieKNmAF3obUjR+aLm36F/t61hAnnNBVR2KFY92ac4E9TZ+DvCNyNe7wpPY9MKKq
                            KoxKWoa6s7Ylo5j98CHxfjr+wqEqYEe1TjvlJWoG586AwBWV/wAWmo6RhwTxXRLvh+MvHJMaR2Dn
                            fU03D59envEtRGPlyG+wE1ibcH68s8DFXzhErjR91HnoPmqCi02HSLpRY19FqDcdIw/1oYC4JnKK
                            r3BMbjoIGG76qPOLbsDnJPwaLWOFnWqgzXSMvCPyS55+OuYhMOIrHJ5eRKrHK7W2JnID1YM/NR0j
                            ZcaM+QDkz6Zj5KFi1n8xItYPxV443KWFm+fNsNLncwrb/mA6RMp5MhnbFD39whLz7UrshUNayrGd
                            2dJLpI5rjv/adIyUGzPmU+BO0zHyjjCCWbO+E8tH4igcXGT6OPPMu+wu95gOkTbtOg3YYDpGninA
                            8WK6i4itcLhN+2EfiqaXcG3aZ2IzqarqC8BOqZB2cmFH26zoxFY4HD075s9YCdAGasrmmE6R/sP2
                            3YAdnzTN9EDmzRwa7daxFQGRStOHl2d+k3ONvaJRUbEauMV0jLyjUhXtptEXjslNB6F6hOljyyOP
                            Uhd83nQIcwpuAtaaTpFXVMfiulHVhFiuOM4yfVx5xRHXdASjysvXAdNNx8grwt4cNTCqoQWjLxyq
                            UV/GWInSedSUNZpOYVy7Tgdy/zV0JonydiW6wjGpcSC2Q1u6eGAHuAGgqmoNat+wpJeOieZ2Jcor
                            Dhll+nDyyEzqgq+bDpE5fDcBG02nyCPf4ejDjulpoygLh37f9NHkiTASdk2HyCgVFZ8j3G06Rl7x
                            tMcZ7nsuHO6rOwFRv9+1EvIQtUPfNh0i44Sd3wGtpmPkkR47vfVcOHyhk7Azz6dDGEneTFs5ZcyY
                            jxDuMx0jjwxm3oN7dLdBz4VDvdNMH0WemEFt2TLTITJW2LkeCJmOkScc1H9q9xt0p2Nc0W53YCWF
                            4nnXmQ6R0caM+QB42HSMvKFyUneruy8cUxYdDOxt+hhyn8zDHfKG6RQZT/QGIP+a4JsxrLuV3RcO
                            z5fwVHFWNHSa6QRZYXTVv0AfNx0jP+i+zJpV3NXa7guHQ1Jmtra6owuoCzSZTpE95HemE+QNJ/xf
                            Xa7q9oNqX8OmnCNTTUfIKuWVC0FfMR0jL6jEUTjcF3cHDjSdPacpz1ETeMl0jOzj2Jnu00E4oatV
                            XRcOKbC3KanmqL3sjke7Vw98YDpGHjiQ+vqIE8p3UzicIaZT57i3qAk8YjpEVqqqCoPaLvepJ/jl
                            6EgrunvGcZTp1DlNuTEvR/dKlj6b7gZWm46RBwZFWthN4bCjfaXQKrTlIdMhstqp57WgtvNbGsRQ
                            ONzF/YA9TSfOWaI34w7fZDpG1vPrrUD+jABvhMRQOMQ70nTcHPY14UI76VAyjKz6GGWe6Ri5TQdQ
                            X99726VdFA453HTcnKXcg3v0OtMxcoZjxyVNMYdCBnReGJFnC0dqeKjvNtMhcsroyueBxaZj5LiD
                            tl3QReGQg3rakxWXR3AHLTcdIvfo7aYT5DSVg7dd1NVblRLTWXOSyq2mI+Skou0eAlaZjpHDorji
                            mP5eERDTzNVWNORt6gY/aTpFThoxohX4k+kYuUujKBxr1hRj54dNPtFbbYOvFHJCd2BfzaaI9N92
                            SecC4dMS0zFz0DrCff9qOkROG/XDT+yr2ZTZnQULirZc0LlwqK/EdMoc9L+4AzeYDpHzHMe2j0kN
                            IbRhry0XRLgl8Yqj3ZsVJQnfZTpCXhhVsRDkXdMxcpIn+2z5Y4TCIbubzphTlOfsXClpIqKoZ/uv
                            pIL2WDjY1XTGnCL2aX9a+UN/wU7elHzqbfWmNVLh6Gc6Yw5Zh+fMNh0ir4w8+0uQWaZj5BzH2WWr
                            HyNsYq84kud/cQfbCZPTzRH7kDTZVHfe8kd7xZFa9n7bhFFjngN903SMHNNN4VCVbTew4qS8RF1g
                            qekYecwW7eTaacsfti4cN77RB/CbTpgTHLGTJJukBfdjH5ImUzfPOFpaimLaldWVNnzeTNMh8lpF
                            xWrADgadLMp2W/64deHwF9rCkRT6d8YH7UC6pon8r+kIOUNkqzuRbZ5xOIWm8+UEcWy/lEyw466P
                            InxmOkaO2Ko2bFM42mzhSNxqwn3+aTqEBQwfHkJ5wHSM3KDdFI6wz96qJEwfwh3YZjqFtZlP/mI6
                            Qo7opnAg9oojUY7av3CZ5MyxS7FjkiZDd4XDStBHVAcbTIewtqH2IWkSbDUI1daFw/Hse+9EKLPs
                            KF8ZyN/2N+zoYInaagKxrQuHePbePBGitnNVJhp59pcIC03HyHLdFI5wgb3iiN8qDl75kukQVhc8
                            edh0hKwmfLPlj9s847BXHHFTZlNVFTYdw+pCr01zYOtffisG2t0VR1GrveKIn71NyWQjzlkPPGo6
                            RtYS7aZwtPa2hSM+69nTec50CKsHir1diZdKN4VjwqBvsE+f47GQiwfb85bpvtowH1hvOkZWkm7f
                            qogCtnNWrEQeMx3BisIFF2xCmG86RlZSbdnyx84NwIQvTWfMPt7jphNYUVKZYzpCdnI+3eqnTuvV
                            Fo7YyNvUBleYTmFFqd17bNvLbisautWk3hGanKstHDFRe5uSTaqqNqD6lOkYWWeb4QkiFA7HFo5Y
                            qNoZ6LOPnWM2ZmKvOJJI0fDLpkNYMXJC8wDPdIysEpaerjjkQ9MZs4e8g3vsGtMprBiNOnsV0GQ6
                            RlbxtfVQOBT7oC9qnr3ayF72diV6SuGOn2+5oHPhcOQD0ymziC0c2Up9C0xHyCKrGTFiq1blnQvH
                            7vwbsJ21oiK2cGSr8vI3gC9Mx8gS72y7oHPhuHhwO+hHppNmgRa8srdNh7DiJKIIz5iOkRU0msIB
                            gDSbzprxhPdwxT6Zz252cJ9oOCzrvCgSkeWms2aBZYnvwjJK1BaOaHjRXnGovmE6a8bz9J3Ed2IZ
                            Napqub26joJPo71V4XXTWbOAveLIBapPm46Q4Vpp7dxEI3Lh8LfaK46e+HjPdAQrCRzbZaB7+l6k
                            ITEjF45rT1gL2Bak3Qn5Pk98J5ZxbTyBbX7eDWdpxKXdfMLernQrtM50AisJqqq+AH3NdIzMpYsi
                            Le26cKjYwtE1D4IbTIewkkQcOxBTV1QjzkzYTeEI34DwN9O5M9TXtg1HDvG8J0xHyFBtfNXyaqQV
                            XRcOd8h6agNnIXIJ2BGTtmGvNnJJiBeAloT3k3te44ILIv7b73nS6dqy24HBCG+aPooMUmA6gJVE
                            VVVtgJ3eYlvCoq5WRTdbfV1gKeG+Q4G7TR9LhuhtOoCVZCL2dqWTyM83INrCAeAO3EBd4CKE04BP
                            o/5cbioyHcBKMgf7gHRbYV+CVxxbqg38E593NMgjpo/LoCKmv2eLRy45c+xSlI9Nx8ggHzFmTJdj
                            88ReOACqh6yiruwM0B+D5ueDwjVf7WE6gpVkInb0829J9/Psxlc4vlUXvA/hCOBF08eZdgW6p+kI
                            VpKJ7bfyHx7/7G51YoUDoDa4Aq9lGCIu+TTvbJjvmI5gJZnPdrPfLESo+3PRc+EY5haUlNV8v9tt
                            3OEhassm4skx5Mvo0UKp6QhWko2s+jdgx6KBF6mq+qq7DXouHM+4IdAriwPV9x103NXbd7utW/Ym
                            XsuxiI4j5xuN6SGmE1ipYJ9zoPrPnjaJ6lZFHZkncG5ru/+N0rLq/+p2Y3d4iNrgb/F8hwPPmj4H
                            KWQLRy4SzxYOCh7taYuoCkfY0bmAAiUqPF0SrL5l4EC3sNsPuYOWc3DziaC/BjaaPhUpMBBVMR3C
                            SjKv4Gk6ftfz1SebR4DvVlSF46OXp34MvPafzyiXtfRpX1waHH9Etx+sqgpTF7wJTw4Hcq2S78LE
                            xgNMh7CSrKLic8jr7hX1iPRYOKN+qyKqc7ZewOGqsqi4bPyvqaz0dftht+wDastOArkY+Nr0mUka
                            R441HcGKX/+y2oGR1+Tzcw59KJqtoi4cIc95kM6XcL1F5MaSlQe82D947aHd7kBEqSu7C6fgcOAf
                            pk9Pkgw1HcCKl+s44k2IuMrJ1+cc8j6jK6N6Kxp14fhwyZT3ka5etUrQUee1kkDN9T0++6g5ZiV1
                            gZEIYyDbm/jq90wnsOKzX6D9GODMfYZe0bnDYivPkpezGepD0dymQMwNwOTBblb6Qa9p6dveVDxk
                            /DE97qo2MBvPORCV35K1/5FkAG7DgaZTWLELwylAkc/rPaTTyo42DEtMZ0w7nzwc7aaxFQ6v4G/0
                            /I/8CPFkUUmgxu35zcvgjUwoGwdeEGWxqfOVEIczTEewYifKyR3/zxkeeYN8e86hr3Pm2KXRbh1T
                            4Whucj8Dohm3wA86oaVve1P/YO2gHreuG7IELQsi8nNgdbpPWWJkpOkEVmxKg+P3UOF4AFGGRdzI
                            y7PnHCJRPRT9Vsx9VVTlTzFsfoSot6g0UP37gcPc7brd0hWP2rI78bceAEwne25f/ospjfuaDmFF
                            T5Efyn9GcdPgXoPcPp026hhOsNV01jQJEXYeiOUDMReOlX0L/o7qJ9FuL1CgcGVLS9uy0sD483r8
                            wLUnrKUucDmeEwBeTsdZS5CDpz80HcKKgce5W/xU2MsJdX6tXlX1DXQ9dF5OUeYyZsxHsXwk9t6x
                            z7ghcO6N+XMieylyb2mg+h/FgZqeO4i5g1/BKzse1Z8CGT75kfRcEK2M0D947aEIWz28V+nidkU1
                            P25XhNtj/Uhc3epV+BNxzn6lcLqgb5YEx187aNDP/N1u7IrHhOCf6V20H6oTydyOcwOZ0vhfie/G
                            SjXxnAu2Xabo8C42z4PCIW8zemzMfcriKhwrG6esQHgsgbR9UJm22rfbaz12mgP4zZEtTAi6OByI
                            6F/JxL4EHpebjmB1b0DQ3UGEiyKsKov4DG7n3RaRSy2dIxG9Ldq2G1uKeyAfx5ObkhD7UBWeLQlU
                            1+9/rLt7j1vXBD6kNngeOEPJvOcfo3Cb9jMdwupaSNv+G9gxwip/y8a24zotHT48BLxgOncKfU1h
                            6/3xfDDuwvFB05QnSd78spXhUPvbpcHqn/XY7wWgbnDD5ucf55M5k2P7cPTXpkNYkQ0YcGkRymVd
                            b9FFew7N5eEE5V5GnLM+nk8mNHSgoMm46vjWLqrcWbLywCXFgZqem3J3PP+4F6/vgM2d5zLhAepP
                            mdxgRwbLQOFdtj8Xkb263sIbFnGx+nJ1OMEwjndbvB9OqHDsEv7yIUVjeo0ThSMFXVgcrH6i696L
                            W3AHtlFXdhde3/03jzxm8p60EORag99vRbDP0Ct6K1LT3TaKDBoQdHfotOJf/3oNWGP6GJJOmMGo
                            qmXxfjyhwrFkyV3tjsgtKTku5SRHvFdKAuNv6n/8uJ17/IA7cEPHyGMFBwN3AaFU5OqRcj7uokMT
                            35GVLP5Q76uA4u62EShoJ3R8pxWu6wHPmz6GJFPQaYnsIOFRzjd+03oHqbtNKAS5wmnzLS8JjL+m
                            x74vAO4xn1AXuBhPBwIPE+dr4wT4cZyUFFMrdvse5+6lItdEtXFXzc9zrnDobEZX/SuRPSRcOFa9
                            cWMLyX3WEckuINe39G3/V2mgujKqT7jBd6kL/BDPO3zzK9x0NmE/iYlNY9L4fVYXfO3t04C+0W3d
                            RXsOz8m1CamvS3QHSRkzc48jrurbu1fRB0DPr1STQGAholeuaJjW49iI/zGpcSBQB4wlGfPJ9OxD
                            Cp3DGTf4q8R3ZcWjNHDtCYrzDNH/9w7T5u/X/Jq7bqulTz9dwLov1wDbR7mfDKbzKa86M9G9JOUf
                            0Ko3bmxBuTlthw4neipLSgLVd+wztHrvqD5UF1hKXeAHabwC2Zd2L23nxNrafoOu2VFx/kpsv+M+
                            8bef0GlpR3uOTGs3FK8pydhJ0v7yftPaemssnd8Stbl3488LwrxXEhh/U1QNyADcIW9RGzwPT45C
                            eIBUPkRVLmBygx2vwwCvoOAP9PBANKKu+63kwO2Kzqe8qjEZe0pa4Vj1xo0tIkxIfE8x6w1yRSjU
                            /n5JWc20fYa6u0T1KbfsTWoD5+CFD0DlVqAlJelU7sZ9Za/Ed2RFqyRYPQrl/Hg+++04HZ34fNn+
                            gDSEMC5ZO0vuvCCVlb7ilQe+JnBY2k/LZgobBLmdtoLrO92rdsdd3A9f+EJUfgUke0Lpl9nD+S4X
                            D86fuXUNKRkyrkQ9X5NAvzh30d4W9u/0yRJ367mAFiwooq1lHUov08cYH7mF8rG/StbekvuQcMaM
                            MNG++koRge1Ar6Gw/f2SQI0bsVFPJO7gL6kN/pbeRQMQvQxoTmKsoazyEnpvbvVs4DB3O/V88xMo
                            GgD+Iqd9cKelI0a04mlSLvMNWIs6k5O5w6S/XVjZMGWBQCY0090FdEJI298tCdZcXjLMje4vxW+O
                            bKE2eCte2f6InEzHVA7J6I17FZObLjZ9UnKYtGxs+2syrnYVIs+XI5KdzzlUXCoqkjokZ0peS3qO
                            XApkymX5Hqj+QTe2vVcaqL4k4jBxkXQMZfgkdYGReHrw5tHY1yWURPVWJjadbPqE5KLiYPUkkNFJ
                            2ZnQ1URb2ficYxlfrL4j2TtN2dynxYGaGwT9TWrPSewUvhTkzxr2blm5ZNqnMX34+sU70u6dj/IL
                            IN5pEb4C/S51wWT1LM57JcGay1H9QxJ3ubq5cepubHulWV+/HX5Zy3/GK80CykgqKpM+AVrKCsde
                            g9w+hb72t4jnlVh6tCrU+/CmfNB43bsxfVJVmNR4Co5zIapnAkUxfvcXePI93LJ8nqM0KYqD438i
                            KneT5N9l8eTgFYundO4ENqe+EaTM9HFHdxA8wujKlDQHSFkLyk+WuBtRjD4o7UGRwLkeztvFger5
                            pYOrA1F/UkSZEHyM2rIqPP+em7v1vxjDd++Go09tbs1qxak0MP486Rh1P+l/ANXX1e1K1jzn+Aqf
                            puyZWkqbXjc3Tf2bwCOp/I5knAOBM9ShoSRQ/dh+ZTUnxfRp9+h11JXdRV3geDxv4OZnIaui+ORu
                            wLNMarDzz8ahpKzmvxW5hxT9Dqtq5MKhvGT62KM8gqsZWZWyKVZTdqvyrQFBd5+Qtr9J5CHbMpPy
                            ior+3r/m61nLl98a+9wa7tJCZMPpCGeDnEa3nax0A6JjqB3yuOnDzhJSEqyehiavMVMX3mpunNr5
                            inDeg3vg+T8zfRJ68Cyjxw6PZyzRaKW8cACUBsb/VIlpIqdMsQ6l3nO8W/7dcN1bce3BXdwH0dNw
                            vDGonEHkjlLtoL+gLni36QPOZAMHuoUbtgv9WVTPScPXacjn7/fRy27nQXzmzFwBWmL6fHShlbAc
                            xdix76TyS9JSOAApDlY/LkpstwGZw0NZqMj/9PM+n79kyV3xvWqe/l4Ra9eegnAGUE7H7cqW7sLr
                            eynuwDbTB5xp9j3O3cvXHnoQ9Lvp+k71dMTKxdMe7bRizowHgUydhOsayitvSPWXpKN7OYCKhC8C
                            srWLuYNwsojOWu3bbWVxsHryfoOu6R/zXi47oJUJgfkdAw313QfV74PcBHw7qMrPcFqeslNKbq0k
                            MP5UX3v7q+ksGgD4pKv2HJnaU3YxO/VL9dg4QPquOAAoDVRXKtSn8ztTyFPhKUe5a0Uf/5yOGe4S
                            4L64O1LwXUROAo4DrqcuENfQ9TljmFtQsjFUA1pL+v7Ibemp5sapJ3ZaOm/mYDxtMn16trEBDQ+i
                            4qzYmhbEKa2FA6A4WPPXNN2jptPHqjzkiHP/isbJiTfsUhUmNx6Bp6txhyR7MOisUDxk/DGOJ3cp
                            DDKVQWHDyj7+nTv9UbjzTj+777IOiK4VclrIuZSPTdsfmrQXjgFBd4eQtr8G5OQ0AgpvCnq/T+XB
                            95umZsqcL1njoOOu3r61rWAyIpcAPc+xk2Lq6KCVi6a90mnF7PpnEcmMaT+Vv1BR+ZN0fmXaL/+W
                            N7jrFe9HZE5flqTq6GQl14eFlSWBmpeKA9VXlh5bnamtZzOJlJaNr9rUXvAWIpeTAUUDwPG6es4h
                            mfKc4z18hWmffjTtVxzfKglW/yqdww0apghNKLPUkfkrF01523SgDCKlQ2pGqqeTgCNNh4ngoebG
                            qWd3Wjp7xiiEuYazteLIUEaNfTXdX2yscACUBKsfRvmByQyGfKDoI444//Ct/urZuBqZZT8pDtac
                            Juq5Gd73Y2Vz49SSTktnz94dCUfTQjh1VC6hYuztJr7aaOEYOMzdrmVjewOQzxMYtSA8p54uFFjY
                            3FT4BrjpngsmbfofP25np63gfNCfE38P47TSsO4VsSf1nJnLQfc3FOteyivPN3VOjBYOgJJB1x6M
                            z2kkJ4aeT1xHt3+eRuRFCevLu+gXr8bd4CxTVFb6SpoHHA/OjxHOAnqbjhQLBxn5QeOUzl3T58z4
                            K2DiDeFLFPX9HiNGGLtSNV44AIqDNSNE9e9kyAOxDPMN0AQsQnlFVF5bsbjgvUy/Ktln6BW9/dr3
                            ZA3raBVGJjicn2Eysblxittp8eyZv0Q07omb47QS9QWoqDA6yXpGFA5IyWAsOatjQGbeAN4AeVeF
                            ZQVO6N33i3o1J9wQLU4Djr52t3CBMwRhiCrHIgTIqHYO8RN4ZEXj1M7jWsydGUR1URqjfAN6AuVV
                            SzLgnGSOkkD1HcDPTefIYm3Ah8DHKvJvUT4W+NhTXYPqGvHJWgnLWs+hTQtD6wC2L+jVvnS3pd/0
                            /3T/HQDCbeL424rCW44Q3//4cTur9uotbZt6+dTXz/Oxr6O6n0IpyH7AAcB+pg8+hT5rbpz6nU5L
                            6+t745f1pGdEMAU5i/KxGdHyOqMKB8PcgpKW9gUIdlzODKAQkmwaJi+FCsS/7/IGt3Mr3jn1/wJJ
                            /XQgqjVUVE01fR6+ZaL9f9eecUNFhe1jBIxfiln/mS3PAkIaGhx5jZP6NhTC7ZlUNCDTCgew7MUb
                            vvaH/d8HliW8M8tKEhWN3GdGSHXhuJ/Xll5m+vi3lXGFA+DdJe6XPuVkOu7XLcs4USJfcXjeKzHu
                            KgY6n536XYCbeW/QMrJwALzfNPVDET0DWJPwziwrcUdHXNqr7VUgFf+wn2FdSxXDhxt5S9aTzHo4
                            GkFJ2fijEFkIRDeZtGWliIjuuaJhWudm5nNmvAcMSN436evgH0Z5+TrTx9yVjL3i+FZz07TX1HNO
                            wl55WMY5XXXCS+btyqsUhE7K5KIBWVA4AFYunvyqOnoysNZ0Fiuf6RGRF2uyHpAuRn0nM/LsL00f
                            aU+yonAArFw07RWEEdjiYRniIZGvOESSccXxPEWtJyZ7cuhUyZrCAdDcMHWRp84JqH5iOouVf0S7
                            uuLwJdru6BnadQQjzllv+hijPhemA8SjOFBTKugTgKkuzVZ+au/b4t9u6VK38/QVc2Z8COwT8x6V
                            v9Orb5XJnq7xyKorjm+tbJyywqcMR0jppDOWtQ3/xr7hQ7pYF8eEXfIgX6wZm21FA7K0cEBHO4+Q
                            4z8O5FnTWaz8oXiRB52K9Y+YMJ3X3zyXiy/OyrFWsrZwAHz0srumb0vBKSqS3/OPWGkkB0Vc7Em0
                            48i2oXI+oysvz8QWodHK6sIBsHSp27ayYcp5IBNNZ7HygOjBXSyP5opjDXAqFWPvNX0Yicr6wrGZ
                            bh6h6Xxgk+kwVg5TIhcOp72HKw55n7AcR3nlM6YPIRlypXAA0Nw49V71nGOBZtNZrJx1ILid/92M
                            OnsVXc+N/BTqBFM9g3w65VThgI5WpoVhf5nAQtNZrJzUe79B30R+7aqs7LREmM5O/U7NloZd0cq5
                            wgEd3fJX9PF/H/RmQE3nsXKLFvgP7mJV8xb/fzVwOqMrL8/UHq6JyMnCAcAzbqi5cdqVooxSyPi2
                            /1b2UK+LhofOt4VDmyA0mPLKR01nTZXcLRybrWiaOt8RPQx43HQWK2fsG3mxNCNMp53jKf9hs+mQ
                            qZTzhQNgRcO0Vc3F744AdRVy7rLRSi91uigca7++g9GVl1NV1RbjLrNOVvZVSURpcPwRqnIvcJTp
                            LFbWeq65cep3TYcwKS+uOLa0omHaG7uGvwhsbjAWNp3Hykr7Jr6L7JZ3VxxbKg5cO1Rw/gwckvDO
                            rHzS1tzo753p03CmUt5dcWxpZeN1L+8a/uJIRH6lsMF0HisrfCzoRflcNCDPrzi21L9s3H6O47sN
                            5TTTWazMoxAS4Y9FBe01y1684WvTeUyzhWMbpcGasap6A1BqOouVIZQnPJwr/t00eanpKJnCFo4I
                            Bg50C1u2C/03qhOBHU3nsYx5T6B6RePUGaaDZBpbOLqx/7Hu7uH29skIFwI+03ms9FD4UkSm7Br6
                            /I9LltyVlQPtpJotHFEoDtSUiuo4W0Bym8IGQW53wu3XfbDkt18lvsfcZQtHDPYfPP6wsI+JqJRj
                            z13O+LZghHwFN3z0smsn/oqC/eWPQ/Hg2qNxwuMFqSDPX2lnuXUqcmtRqGD6u0tc2xEyBrZwJGD/
                            oeMGhMPOVSA/BnqZzmNF7TNEpxdQePvyBjdr5jLJJLZwJEFpcPweqHOpohcBu5vOY0UmsAThlj4b
                            /H+LODeKFTVbOJJowIBLi9p32X6MI84vVPU403ksANoQ5oh6t69ovO5502FyhS0cKVIaqD1S8X4O
                            /ADY2XSePLRMhLt9bd69y1+97gvTYXKNLRwpVjLM7SUb20d6cB7wfYEC05ly2FqUGSLe/Ssar3sB
                            O2xkytjCkUalwfF7KM5ZKGNAj8O+kUmGjcAjCA8UrF7/z+XLb8266RSzkS0chuwduHbXQuR0D6kU
                            OAUoNJ0pi6wFnhT0H336FM5e+oxrezanmS0cGaDkKHcnKQqd5KmeKsgpoP1NZ8owCrwG8riK91i/
                            0Jcv2KbgZtnCkYGKh9QcIqqnovpdkGPJx1e8wjuqvIDyjOPokysapq0yHcn6f7ZwZIH9Atce6Inv
                            OFSPRylT4ZAce8j6NfAq6BIVedFBX7CFIrPZwpGFSoa5vZyN7YepytEq3tEizhGe6kEC/Uxn64EC
                            zQJvKSwV1X95PmfJykUFy/J9RK1sYwtHDul//LidfZt8ByB6oCIHIBSj7IWwN7A3qR9bRIEvFD53
                            YCWqzTjSDNLsiffBpo1ty1a9cWOL6fNkJc4Wjjyy1yC3j4/Qd6RAdirwdGd12An1dkJkJ1X1Cc72
                            uvkWSNTbThG/irYKzsb/34u3VpAWha9V5WsfrPfwvgwXFn7+oZ/Peca189ZYlmVZlmVZlmVZJvwf
                            A7nWtg/jkckAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjEtMDctMjNUMjA6NTI6MjIrMDM6MDD/vawk
                            AAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIxLTA3LTIzVDIwOjUyOjIyKzAzOjAwjuAUmAAAAABJRU5E
                            rkJggg==" />
                        </svg>
                    </span>
                    <h2 class="brand-text">{{ env('APP_NAME') }}</h2>
                </a>
            </li>

            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- Foreach menu item starts --}}
            @if (isset($menuData[0]))
                @foreach ($menuData[0]->menu as $menu)
                    @if (isset($menu->navheader))
                        <li class="navigation-header">
                            <span>{{ __('locale.' . $menu->navheader) }}</span>
                            <i data-feather="more-horizontal"></i>
                        </li>
                    @else
                        {{-- Add Custom Class with nav-item --}}
                        @php
                            $custom_classes = '';
                            if (isset($menu->classlist)) {
                                $custom_classes = $menu->classlist;
                            }
                        @endphp
                        <li
                            class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                                class="d-flex align-items-center"
                                target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                                <i data-feather="{{ $menu->icon }}"></i>
                                <span class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                                @if (isset($menu->badge))
                                    <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                                    <span
                                        class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge }}</span>
                                @endif
                            </a>
                            @if (isset($menu->submenu))
                                @include('panels/submenu', ['menu' => $menu->submenu])
                            @endif
                        </li>
                    @endif
                @endforeach
            @endif
            {{-- Foreach menu item ends --}}
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
