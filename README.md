# Marusuku

## 오프라인 구독 상품 플랫폼

### 특징, 어려웠 던점. 배운점

- 좌표계 활용을 위해 Point,Polygon 등의 공간 데이터를 활용
  - Blub 상태의 Point를 GeoCode 좌표값을 Casting
  - Spatial Function을 이용한 Bounds 포함, 거리 탐색 
- index() (viewAny) 를 항상 Pagination으로 리턴하며 공통 Filter(where), With(Join), Sort(order) 기본 사양을
    표준화한후 Global Helper 함수를 통해 한 줄의 코드를 통해 Client 측에서 다양한 쿼리를 할 수 있게 함. 클라이언트 측에서도 TS를 특징을 활용한 URL Query 생성 함수를 만들어서 클라이언트측의 실수를 최소화하며 쓰기 편하게함.
- pusher 라이브러리 엔진에 내장 websocket 서버로 교체후 (확장 라이브러리 사용) 사용
- Full Text Index를 적용하여 검색 쿼리 적용, 처음에 일부 컬럼명을 예약어인 desc로 하는 실수를 통해 예약어 주의에 대해 다시 환기함.
- 가게 별점은 빠른 쿼리 처리를 위해 비정규화로 "실제스코어", "총 스코어 합" ,"평가 횟수"로 나눠서 관리함. 리뷰 테이블도 별도로 존재하여 데이터 무결성을 위해 트랜잭션을 사용.
- Faker로는 좌표 값을 시딩할 수 없어 공공 데이터에서 좌표값이 있는 음식점 CSV 파일을 구하여 천개 이상의 음식점 데이터를 시딩함.
- Self 참조 , M:M , N:M,  N:N 다양한 DB 관계 실제로 적용
- 다음 주소 찾기 API에서 도로명 주소를 받아 브라우저에서는 CORS로 실행 불가능한 Google Map API를 라라벨 서버에서 실행하여 주소를 실제 좌표로 변환함.
- Model인터페이스를 상속하는 ORM의 with property는 SQL 쿼리 분석 결과 Lazy Loading으로 처리되어 사용하지 않기로 함.
- API Resource 컨트롤러를 사용할 경우 API Resource Policy가 매우 유용함.
- Gate, Policy, Requests, Collection을 모든 모델에 적용하지는 않았지만 각각의 사용법을 어느정도 숙지함.
- 세션 쿠키의 존재여부로 SPA에서 로그인 가능 상태인지 확인하기 위                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           해 라라벨 Sanctom이 자동 생성해주는 HTTP ONLY 쿠키와 같은 만료기간을 가진 쿠키를 미들웨어를 커스텀해서 추가함.

### 향후 공부 목표
- 라라벨 성능 향상을 위해 라라벨 옥탄 사용
- Redis 등을 활용한 캐싱 작업
- 권환 관리 부분 철저하게 보충
- Socialite를 활용한 Oauth 로그인
- 아임포트 연동을 통한 결제 테스트
- 라라벨 테스트 공부
- 
- 파라미터 , 리턴 값 TypeHint 작성.
